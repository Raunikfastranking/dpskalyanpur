 <div class="bg-[#005224] my-10">
     <div class="mt-10 sm:mt-8  custom-container-1280 px-4 lg:px-0">
         <div class="text-center text-white pt-10">
             <h2 class="md:text-[45px] text-[32px] leading-11 mt-4 text-[#2C4073]"><?= $data['content_heading'] ?? "" ?></h2>
             <div>
                 <?= $data['content'] ?? "" ?>
             </div>
         </div>
         <div class="sm:py-8 py-5  ">
             <?php include __DIR__ . '/../includes/sections/section-content.php'; ?>
         </div>
     </div>
 </div>