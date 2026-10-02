 
<div style="background-image: url('./assets/images/yellow.png');  background-repeat: no-repeat;" class="bg-cover my-10 py-5">
     <div class="mt-10 sm:mt-8  custom-container-1280 px-4 lg:px-0">
         <div class="text-center">
            <?= $data['content_heading'] ?? "" ?>
              
             <div>
                 <?= $data['content'] ?? "" ?>
             </div>
         </div>
         <?php include __DIR__ . '/../includes/sections/section-content.php'; ?>
     </div>
 </div>