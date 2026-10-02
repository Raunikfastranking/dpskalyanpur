   <div class="mt-10">
       <div class="grid 2xl:grid-cols-3 xl:grid-cols-3 lg:grid-cols-2 md:grid-cols-2 grid-cols-1 gap-5 md:mt-10 mt-5">
           <?php foreach ($data['resolved_content']['media'] as $items) { ?>
               <div class="relative">
                   <a data-fancybox="gallery78" data-src="<?= $data['media_url'] ?? "" ?>">
                       <img src="<?= $items['media_url'] ?? "" ?>" alt="<?= ms_esc_image_alt($items, trim(strip_tags($items['heading'] ?? '')) ?: 'Gallery image') ?>" class="w-[100%] md:h-[275px] h-[250px] object-cover rounded-[10px]">
                   </a>
                   <div class="absolute bottom-[30px] left-0 right-0 p-4 text-white rounded-b-[10px] relative z-10" style="background: #003618;">
                       <div class="absolute top-[-51px] md:right-[20px] right-[5px]">
                           <div class="relative">
                                <p class="absolute md:top-[22px] top-[22px] right-[-13px] w-[100px] h-[55px] rounded-[10px] bg-[#003618] md:text-[15px] text-[13px] md:leading-[24px] leading-[18px] font-semibold text-center">
                                   16 Sep <br> 2025 </p>
                           </div>
                       </div>
                       <div class="flex items-center gap-3 border-b-[1px] border-[#e7b78a] pb-[14px]">
                           <div class="md:text-[16px] text-[14px] font-[400]">
                               Category : <span class="font-[500]">Gallery</span>
                           </div>
                           <div class="md:text-[16px] text-[14px] font-[400]">
                               Total Photo(s) : <span class="font-[500]">1</span>
                           </div>
                       </div>
                       <div class="mt-3">
                           <h2 class="md:text-[24px] text-[22px] md:leading-7 leading-7">
                               <?= strip_tags($items['heading']) ?? "No Title" ?></h2>
                           <!-- <a href="gallery-detail.php?id= " class="rounded-[20px] bg-[#096130] text-white w-[100%] block text-center h-[47px]  text-[17px] mt-[20px] transition-all hover:bg-[#c4171d] p-[10px]">
                               View More
                           </a> -->
                       </div>
                   </div>
               </div>
           <?php } ?>
       </div>
   </div>