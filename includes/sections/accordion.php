 <style>
    .icon-plus,.icon-minus{
        color: #fff;
    }
 </style>
 <div class="mx-3 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3">
     <div id="accordion" class="space-y-3">
         <?php
            foreach ($data['resolved_content']['items'] as $items) {
            ?>

             <div class="bg-[#003618]  rounded-[5px] shadow overflow-hidden ">
                 <button class="w-full flex items-center justify-between px-4 py-3 focus:outline-none heading-btn" aria-expanded="false">
                     <div class="flex items-center gap-3">
                         <span class="font-medium text-white"><?= $items['title'] ?? "" ?> </span>
                     </div>
                     <svg class="w-6 h-6 transform transition-transform duration-200" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                         <path class="icon-plus" d="M12 5v14M5 12h14" />
                         <path class="icon-minus hidden" d="M5 12h14" />
                     </svg>
                 </button>
                 <div class="px-4 overflow-hidden content bg-white" style="max-height: 0; transition: max-height 300ms ease;">
                     <div class="py-3 text-gray-700 overflow-x-auto">
                         <?= $items['content'] ?? "" ?>
                     </div>
                 </div>
             </div>
         <?php } ?>

     </div>
 </div>

 <script>
     // Basic accordion behavior: allow only one open at a time
     document.addEventListener('DOMContentLoaded', () => {
         const accordion = document.getElementById('accordion');
         const items = accordion.querySelectorAll('.heading-btn');

         function closeAll() {
             items.forEach(btn => {
                 btn.setAttribute('aria-expanded', 'false');
                 btn.nextElementSibling.style.maxHeight = '0';
                 // icons
                 const svg = btn.querySelector('svg');
                 svg.querySelector('.icon-plus').classList.remove('hidden');
                 svg.querySelector('.icon-minus').classList.add('hidden');
                 svg.classList.remove('rotate-45');
             });
         }

         items.forEach(btn => {
             const content = btn.nextElementSibling;

             // Click toggles the panel
             btn.addEventListener('click', () => {
                 const expanded = btn.getAttribute('aria-expanded') === 'true';

                 if (expanded) {
                     // close this
                     btn.setAttribute('aria-expanded', 'false');
                     content.style.maxHeight = '0';
                     const svg = btn.querySelector('svg');
                     svg.querySelector('.icon-plus').classList.remove('hidden');
                     svg.querySelector('.icon-minus').classList.add('hidden');
                     svg.classList.remove('rotate-45');
                 } else {
                     // close others
                     closeAll();
                     // open this
                     btn.setAttribute('aria-expanded', 'true');
                     // use scrollHeight for smooth open
                     content.style.maxHeight = content.scrollHeight + 'px';
                     const svg = btn.querySelector('svg');
                     svg.querySelector('.icon-plus').classList.add('hidden');
                     svg.querySelector('.icon-minus').classList.remove('hidden');
                     svg.classList.add('rotate-45');
                 }
             });

             // keyboard support
             btn.addEventListener('keydown', (e) => {
                 if (e.key === 'Enter' || e.key === ' ') {
                     e.preventDefault();
                     btn.click();
                 }
             });

             // When content transition ends, clear maxHeight if closed to allow inner changes
             content.addEventListener('transitionend', () => {
                 if (btn.getAttribute('aria-expanded') === 'false') {
                     content.style.maxHeight = '0';
                 } else {
                     // keep as scrollHeight in case content changes
                     content.style.maxHeight = content.scrollHeight + 'px';
                 }
             });
         });

         // Optional: Open the first item on load
         // items[0].click();
     });
 </script>