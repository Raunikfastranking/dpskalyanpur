 <div class="mx-3 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3">

     <!-- table container -->
     <div class="bg-white shadow rounded-lg overflow-hidden">

         <!-- responsive table -->
         <div class="overflow-x-auto">
             <table class="min-w-full divide-y divide-gray-200">
                 <thead class="bg-[#003618]">

                     <tr>
                         <?php
                            foreach ($data['resolved_content']['columns'] as $column) {
                            ?>
                             <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-white uppercase tracking-wider"><?= $column['title'] ?? "NA" ?> </th>
                         <?php } ?>
                     </tr>

                 </thead>
                 <tbody class="bg-white divide-y divide-gray-100">
                     <!-- row -->
                     <?php
                        foreach ($data['resolved_content']['data'] as $row_data) {
                            // print_r($row_data);
                        ?>
                         <tr class="hover:bg-gray-50">
                             <?php foreach ($row_data as $cell) {
                                //  print_r($cell)
                                 ?>
                                  <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-700">
                                     <?= htmlspecialchars($cell) ?>
                                 </td>
                             <?php } ?>
                         </tr>
                     <?php } ?>


                     <!-- add as many rows as needed -->
                 </tbody>
             </table>
         </div>

     </div>
 </div>