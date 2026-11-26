<?php
if (!defined('APIS_INCLUDED')) {
    define('APIS_INCLUDED', true);
}
require_once dirname(__DIR__) . '/proxy/config.php';

$api_url = "https://dps.allenhouseschools.com";

// CMS content embeds media as relative /upload/... paths — rewrite to absolute CMS host
// so images/files resolve on any frontend domain (local dev, production, etc.).
ob_start(function (string $html) use ($api_url): string {
    return str_replace(
        ['src="/upload/', "src='/upload/", 'href="/upload/', "href='/upload/"],
        ['src="' . $api_url . '/upload/', "src='" . $api_url . "/upload/", 'href="' . $api_url . '/upload/', "href='" . $api_url . "/upload/"],
        $html
    );
});

/** Match `/galleries/type/achievements/branch/{id}` — used by year filter + pagination (`/api/galleries/branch/{id}/year/{year}`). */
if (!defined('DPS_KALYANPUR_GALLERY_BRANCH_ID')) {
    define('DPS_KALYANPUR_GALLERY_BRANCH_ID', DPS_KALYANPUR_BRANCH_ID);
}

function fetchMultipleApiData($endpoints)
{
    $baseUrl = "https://dps.allenhouseschools.com/api";
    $mh = curl_multi_init();
    $curlHandles = [];
    $responses = [];
    // Create all curl handles
    foreach ($endpoints as $key => $endpoint) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $baseUrl . $endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // disable SSL check if needed
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, api_auth_headers());
        curl_multi_add_handle($mh, $ch);
        $curlHandles[$key] = $ch;
    }
    $running = null;
    do {
        $status = curl_multi_exec($mh, $running);

        if ($status > CURLM_OK) {
            break;
        }
        curl_multi_select($mh);
        usleep(10000);
    } while ($running > 0);

    // Collect responses
    foreach ($curlHandles as $key => $ch) {
        $content = curl_multi_getcontent($ch);
        $responses[$key] = json_decode($content, true);
        curl_multi_remove_handle($mh, $ch);
        curl_close($ch);
    }
    curl_multi_close($mh);
    return $responses;
}
$endpoints = [
    'home_data'   => '/pages/home-page-kalyanpur',
    'flyer_data'   => '/flyers/branch/9',
    'statistic_data' => '/statistics/branch/9',
    'menu_data'   => '/menus/6',
    'header_footer_data' => '/public/branches/9/layout-parts/',
    'scroll_text_data' => '/scrolling-texts/branch/9',
    'excellence_data' => '/pages/excellence-in-action-page-kalyanpur',
    'celebrating_data' => '/pages/celebrating-excellence-page-section-kalyanpur',
    'spotlight_data' => '/pages/excellence-in-the-spotlight-page-kalyanpur',
    'embark_data' => '/pages/embark-on-a-journey-of-excellence-page-kalyanpur',
    'mv_data' => '/pages/mission-vision-core-values-page-kalyanpur',
    'our_moto_data' => "/pages/our-motto-aspiration-span-page-kalyanpur",
    'h_data' => '/pages/history-page-kalyanpur',
    'society_data' => '/pages/dps-society-page-kalyanpur',
    'chairman_data' => '/pages/pro-vice-chairmans-message-page-kalyanpur',
    'principal_data' => '/pages/principals-message-page-kalyanpur',
    'management_data' => '/pages/management-committee-page-kalyanpur',
    'senior_data' => '/pages/senior-wing-page-kalyanpur',
    'middle_data' => '/pages/middle-wing-page-kalyanpur',
    'preparatory_data' => '/pages/preparatory-wing-page-kalyanpur',
    'foundational_data' => '/pages/foundational-wing-page-kalyanpur',
    'phfd_data' => '/pages/physical-health-fitness-development-page-kalyanpur',
    'music_data' => '/pages/music-dance-department-page-kalyanpur',
    'foundational_stage_data' => '/pages/foundational-stage-page-kalyanpur',
    'smart_class_data' => '/pages/smart-classrooms-page-kalyanpur',
    'preparatory_stage_data' => '/pages/preparatory-stage-page-kalyanpur',
    'middle_stage_data' => '/pages/middle-stage-page-kalyanpur',
    'secondary_stage_data' => '/pages/secondary-stage-page-kalyanpur',
    'sr_secondary_stage_data' => '/pages/sr-secondary-stage-page-kalyanpur',
    'junior_lab_data' => '/pages/junior-labs-page-kalyanpur',
    'senior_labs_data' => '/pages/senior-labs-page-kalyanpur',
    'taal_tarang_data' => '/pages/taal-tarang-tasveer-page-kalyanpur',
    'indoor_gym_data' => '/pages/indoor-gym-page-kalyanpur',
    'rivera_data' => '/pages/rivera-our-school-auditorium-page-kalyanpur',
    'infirmary_data' => '/pages/infirmary-page-kalyanpur',
    'cafeteria_data' => '/pages/cafeteria-page-kalyanpur',
    'sports_data' => '/pages/sports-page-kalyanpur',
    'language_skill_data' => '/pages/language-skill-development-page-kalyanpur',
    'assessment_system_data' => '/pages/assessment-system-and-schedule-page-kalyanpur',
    'academic_calendar_data' => '/pages/academic-calendar-page-kalyanpur',
    'health_physical_data' => '/pages/health-and-physical-fitness-page-kalyanpur',
    'national_cadet_data' => '/pages/national-cadet-corps-page-kalyanpur',
    'domestic_outbounds_data' => '/pages/domestic-outbounds-page-kalyanpur',
    'international_outbounds_data' => '/pages/international-outbounds-page-kalyanpur',
    'animation_data' => '/pages/animation-page-kalyanpur',
    'coding_data' => '/pages/coding-page-kalyanpur',
    'robotics_data' => '/pages/robotics-page-kalyanpur',
    'oluxi_smart_data' => '/pages/oluxi-smart-skills-page-kalyanpur',
    'financial_literacy_data' => '/pages/financial-literacy-page-kalyanpur',
    'north_west_sports_data' => '/pages/north-west-sports-academy-page-kalyanpur',
    'house_system_data' => '/pages/house-system-page-kalyanpur',
    'leadership_data' => '/pages/leadership-programme-page-kalyanpur',
    'health_and_well_data' => '/pages/health-and-well-being-page-kalyanpur',
    'mental_health_data' => '/pages/mental-health-and-wellness-page-kalyanpur',
    'panorama_data' => '/pages/panorama-page-kalyanpur',
    'peer_educato_data' => '/pages/peer-educator-programme-page-kalyanpur',
    'shiksha_kendr_data' => '/pages/shiksha-kendra-page-kalyanpur',
    'sewa_data' => '/pages/sewa-page-kalyanpur',
    'career_guidance_data' => '/pages/career-guidance-and-counselling-program-page-kalyanpur',
    'reading_programme_data' => '/pages/reading-programme-page-kalyanpur',
    'admission_overview_data' => '/pages/admission-overview-page-kalyanpur',
    'admission_criteria_data' => '/pages/admission-criteria-page-kalyanpur',
    'process__data' => '/pages/process-page-kalyanpur',
    'withdrawal_policy_data' => '/pages/withdrawal-policy-page-kalyanpur',
    'online_enquiry_data' => '/pages/online-enquiry-form-page-kalyanpur',
    'transfer_certificate_data' => '/pages/transfer-certificate-guidelines-page-kalyanpur',
    'group_transfer_data' => '/pages/group-transfer-policy-page-kalyanpur',
    'bus_routes_data' => '/pages/bus-routes-page-kalyanpur',
    'route_data' => '/get-bus-routes/9',
    'view_tc_data' => '/pages/view-tc-page-kalyanpur',

    'co_curricular_data' => '/pages/co-curricular-page-kalyanpur',
    'sports_gallery_data' => '/pages/sports-gallery-page-kayanpur',
    'club_activities_data' => '/pages/club-activities-page-kalyanpur',
    'class_assembly_data' => '/pages/class-assembly-page-kalyanpur',
    'special_assembly_data' => '/pages/special-assembly-page-kalyanpur',
    'alumni_connect_data' => '/pages/alumni-connect-page-kalyanpur',
    'inter_school_data' => '/pages/inter-school-page-kalyanpur',
    'district_data' => '/pages/district-page-kalyanpur',
    'state_data' => '/pages/state-page-kalyanpur',
    'national_data' => '/pages/national-page-kalyanpur',
    'mun_data' => '/pages/mun-page-kalyanpur',
    'debate_data' => '/pages/debate-page-kalyanpur',
    'olympiads_data' => '/pages/olympiads-page-kalyanpur',
    'dpss_human_data' => '/pages/dpss-human-resource-development-council-page-kalyanpur',
    'spark_data' => '/pages/spark-page-kalyanpur',
    'cbse_data' => '/pages/cbse-page-kalyanpur',
    'superhouse_education_data' => '/pages/superhouse-education-foundation-page-kalyanpur',
    'in_house_data' => '/pages/in-house-training-page-kalyanpur',
    'muse_data' => '/pages/muse-page-kalyanpur',
    'virtual_vibes_data' => '/pages/virtual-vibes-page-kalyanpur',

    'sport_academy_data' => '/pages/sports-academy-achievements-page-kalyanpur',
    'alumni_placements_data' => '/pages/alumni-placements-achievements-page-kalyanpur',
    'school_awards_data' => '/pages/school-awards-page-kalyanpur',
    'principal_awards_data' => '/pages/principal-awards-page-kalyanpur',
    'school_faculty_data' => '/pages/school-faculty-awards-page-kalyanpur',
    'academic_achievements_data' => '/pages/academic-achievements-page-kalyanpur',
    'extra_currucular_data' => '/pages/extra-curricular-achievements-page-kalyanpur',
    'contact_data' => '/pages/contact-us-page-kalyanpur',

    'other_information_data' => '/pages/other-information-page-kalyanpur',
    'art_department_data' => '/pages/art-department-page-kalyanpur',
    'sexual_harassment_data' => '/pages/sexual-harassment-committee-page-kalyanpur',
    'teacher_details_data' => '/pages/teacher-details-page-gomtinagar-jnr',
    'leadership_team_data' => '/pages/leadership-team-page-gomtinagar-jnr',
    'school_guidelines_data' => '/pages/25-school-guidelines-page-gomtinagar-jnr',
    
    'general_information_data' => '/pages/general-information-page-kalyanpur',
    'documents_information_data' => '/pages/documents-and-information-page-kalyanpur',
    'results_academic_data' => '/pages/results-and-academics-page-kalyanpur',
    'staff_data' => '/pages/staff-teaching-page-kalyanpur',
    'infrastructure_data' => '/pages/school-infrastructure-page-kalyanpur',
    'debriefing_data' => '/pages/debriefing-sessions-page-kalyanpur',
    'ourcurriculum_data' => '/pages/our-curriculum-page-kalyanpur',
    'process_____data' => '/accordions/branch/9/filter/id?id=12',
    'faq_data' => '/pages/faqs-page-kalyanpur',
    'photo_gallery_data' => '/galleries/type/gallery/branch/9',
    'achievement_data' => '/galleries/type/achievements/branch/9',
    'footer_link_data' => '/public/link-groups/position/footer/hierarchical?branch_id=9',
    'jobs_data' => '/jobs/branch/9',
    'feestructure_data' => '/pages/fee-structure-page-kalyanpur',
   'fee_____data' => '/accordions/branch/8/filter/id?id=13',
    'video_gallery_data' => '/pages/video-gallery-page-kalyanpur',
    'blogData' => '/blogs/branch/9',
    'testimonial_data' => '/pages/testimonials-page-kalyanpur',
     'parent_teacher_data'=>'/pages/parent-teacher-association-page-kalyanpur',
     'anti_bullying' => '/pages/anti-bullying-committee-page-kalyanpur',
     'discipline_committee' => '/pages/discipline-committee-page-kalyanpur',
     'safety_and_security' => '/pages/safety-and-security-page-kalyanpur',
     'pocso_data' => '/pages/pocso-page-kalyanpur',
       'terms_and_conditions' => '/pages/terms-and-conditions-page-kalyanpur',
       'campus_tour' => '/pages/campus-tour-page-kalyanpur',
       'our_story_data' => '/pages/our-story-page-kalyanpur'

];

$data = fetchMultipleApiData($endpoints);
$home_data   = $data['home_data'];
$flyer_data = $data['flyer_data'];
$menu_data = $data['menu_data'];
$header_footer_data = $data['header_footer_data'];
$scroll_text_data = $data['scroll_text_data'];
$excellence_data   = $data['excellence_data'];
$celebrating_data   = $data['celebrating_data'];
$spotlight_data   = $data['spotlight_data'];
$embark_data   = $data['embark_data'];
$statistic_data = $data['statistic_data'];
$mv_data   = $data['mv_data'];
$our_moto_data = $data['our_moto_data'];
$h_data = $data['h_data'];
$society_data = $data['society_data'];
$chairman_data = $data['chairman_data'];
$principal_data = $data['principal_data'];
$management_data = $data['management_data'];
$senior_data = $data['senior_data'];
$middle_data = $data['middle_data'];
$phfd_data = $data['phfd_data'];
$preparatory_data = $data['preparatory_data'];
$foundational_data = $data['foundational_data'];
$music_data = $data['music_data'];
$parent_teacher_data = $data['parent_teacher_data'];

$smart_class_data = $data['smart_class_data'];
$foundational_stage_data = $data['foundational_stage_data'];
$preparatory_stage_data = $data['preparatory_stage_data'];
$middle_stage_data = $data['middle_stage_data'];
$secondary_stage_data = $data['secondary_stage_data'];
$sr_secondary_stage_data = $data['sr_secondary_stage_data'];


$junior_lab_data   = $data['junior_lab_data'];
$senior_labs_data   = $data['senior_labs_data'];
$taal_tarang_data   = $data['taal_tarang_data'];
$indoor_gym_data   = $data['indoor_gym_data'];
$rivera_data   = $data['rivera_data'];
$infirmary_data   = $data['infirmary_data'];
$cafeteria_data   = $data['cafeteria_data'];
$sports_data   = $data['sports_data'];
$language_skill_data   = $data['language_skill_data'];
$assessment_system_data   = $data['assessment_system_data'];
$academic_calendar_data   = $data['academic_calendar_data'];

$health_physical_data   = $data['health_physical_data'];
$national_cadet_data   = $data['national_cadet_data'];
$domestic_outbounds_data   = $data['domestic_outbounds_data'];
$international_outbounds_data   = $data['international_outbounds_data'];
$animation_data = $data['animation_data'];
$coding_data = $data['coding_data'];
$robotics_data = $data['robotics_data'];
$oluxi_smart_data = $data['oluxi_smart_data'];
$financial_literacy_data = $data['financial_literacy_data'];
$north_west_sports_data = $data['north_west_sports_data'];

$house_system_data = $data['house_system_data'];
$leadership_data = $data['leadership_data'];
$health_and_well_data = $data['health_and_well_data'];
$mental_health_data = $data['mental_health_data'];
$panorama_data = $data['panorama_data'];
$peer_educato_data = $data['peer_educato_data'];
$shiksha_kendr_data = $data['shiksha_kendr_data'];
$sewa_data = $data['sewa_data'];
$career_guidance_data = $data['career_guidance_data'];
$reading_programme_data = $data['reading_programme_data'];

$admission_overview_data = $data['admission_overview_data'];
$admission_criteria_data = $data['admission_criteria_data'];
$process__data = $data['process__data'];
$withdrawal_policy_data = $data['withdrawal_policy_data'];
$online_enquiry_data = $data['online_enquiry_data'];
$transfer_certificate_data = $data['transfer_certificate_data'];
$group_transfer_data = $data['group_transfer_data'];
$bus_routes_data = $data['bus_routes_data'];

$co_curricular_data = $data['co_curricular_data'];
$sports_gallery_data = $data['sports_gallery_data'];
$club_activities_data = $data['club_activities_data'];
$class_assembly_data = $data['class_assembly_data'];
$special_assembly_data = $data['special_assembly_data'];
$alumni_connect_data = $data['alumni_connect_data'];
$inter_school_data = $data['inter_school_data'];
$district_data = $data['district_data'];
$state_data = $data['state_data'];
$national_data = $data['national_data'];
$mun_data = $data['mun_data'];
$debate_data = $data['debate_data'];
$olympiads_data = $data['olympiads_data'];
$spark_data = $data['spark_data'];
$cbse_data = $data['cbse_data'];
$superhouse_education_data = $data['superhouse_education_data'];
$in_house_data = $data['in_house_data'];
$muse_data = $data['muse_data'];
$virtual_vibes_data = $data['virtual_vibes_data'];

$sport_academy_data = $data['sport_academy_data'];
$alumni_placements_data = $data['alumni_placements_data'];
$school_awards_data = $data['school_awards_data'];
$principal_awards_data = $data['principal_awards_data'];
$school_faculty_data = $data['school_faculty_data'];
$academic_achievements_data = $data['academic_achievements_data'];
$extra_currucular_data = $data['extra_currucular_data'];
$contact_data = $data['contact_data'];


$other_information_data   = $data['other_information_data'];
$art_department_data   = $data['art_department_data'];
$sexual_harassment_data   = $data['sexual_harassment_data'];
$teacher_details_data   = $data['teacher_details_data'];
$leadership_team_data   = $data['leadership_team_data'];
$school_guidelines_data   = $data['school_guidelines_data'];
$general_information_data   = $data['general_information_data'];
$documents_information_data   = $data['documents_information_data'];
$results_academic_data   = $data['results_academic_data'];
$staff_data   = $data['staff_data'];
$infrastructure_data   = $data['infrastructure_data'];
$debriefing_data   = $data['debriefing_data'];
$cbse_data = $data['cbse_data'];
$dpss_human_data   = $data['dpss_human_data'];
$process_____data   = $data['process_____data'];
$faq_data = $data['faq_data'];
$ourcurriculum_data = $data['ourcurriculum_data'];
$footer_link_data = $data['footer_link_data'];
$view_tc_data = $data['view_tc_data'];
$photo_gallery_data = $data['photo_gallery_data'];
$achievement_data = $data['achievement_data'];
$jobs_data = $data['jobs_data'];
$feestructure_data = $data['feestructure_data'];
$fee_____data = $data['fee_____data'];
$video_gallery_data = $data['video_gallery_data'];
$route_data = $data['route_data'];
$blogData = $data['blogData'];
$testimonial_data = $data['testimonial_data'];
$anti_bullying = $data['anti_bullying'];
$discipline_committee = $data['discipline_committee'];
$safety_and_security = $data['safety_and_security'];
$pocso_data = $data['pocso_data'];
$terms_and_conditions = $data['terms_and_conditions'];
$campus_tour = $data['campus_tour'];
$our_story_data =$data['our_story_data'];

/**
 * MS API may return alt text as media_alt_text, image_alt_text, or image_alt.
 */
function ms_image_alt($row, string $fallback = ''): string
{
    if (!is_array($row)) {
        return $fallback;
    }
    foreach (['media_alt_text', 'image_alt_text', 'image_alt'] as $key) {
        if (!array_key_exists($key, $row)) {
            continue;
        }
        $v = $row[$key];
        if ($v === null) {
            continue;
        }
        $s = trim((string) $v);
        if ($s !== '') {
            return $s;
        }
    }
    return $fallback;
}

function ms_esc_image_alt($row, string $fallback = '', bool $stripTags = false): string
{
    $text = ms_image_alt($row, $fallback);
    if ($stripTags) {
        $text = strip_tags($text);
    }
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

/**
 * Alt text for gallery PDF cards: prefer first PDF media row from CMS, then heading.
 */
function gallery_pdf_cover_alt(array $data, string $headingFallback = ''): string
{
    $fb = trim(strip_tags($headingFallback)) ?: 'PDF document';
    if (empty($data['media']) || !is_array($data['media'])) {
        return $fb;
    }
    foreach ($data['media'] as $media) {
        if (!is_array($media)) {
            continue;
        }
        $url = $media['media_url'] ?? '';
        $path = parse_url($url, PHP_URL_PATH) ?: $url;
        $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
        if ($ext === 'pdf') {
            return ms_image_alt($media, $fb);
        }
    }
    return ms_image_alt($data['media'][0] ?? [], $fb);
}

/**
 * Card cover when gallery item is PDF-only from CMS (image thumbnail + PDF badge).
 */
function render_gallery_pdf_cover(string $altText = 'PDF document'): void
{
    $alt = htmlspecialchars($altText, ENT_QUOTES, 'UTF-8');
    ?>
<div class="relative w-full h-[200px] overflow-hidden rounded-t-lg bg-[#e8eaed]">
    <img src="assets/images/pdf-document-cover.svg" alt="<?= $alt ?>" class="w-full h-full object-cover object-center" loading="lazy" width="800" height="400" decoding="async">
    <span class="absolute top-2 right-2 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded shadow">PDF</span>
</div>
    <?php
}
