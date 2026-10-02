 
<div class="bg-cover my-10">
     <div class="mt-10 sm:mt-8  custom-container-1280 px-4 lg:px-0">
         <div class="text-center">
             <h2 class="text-[32px] font-[700] leading-9 text-blue-main  relative"> <?= $data['content_heading'] ?? "" ?></h2>
             <div>
                 <?= $data['content'] ?? "" ?>
             </div>
         </div>
         <?php include __DIR__ . '/../includes/sections/section-content.php'; ?>
     </div>
 </div>