<?php $this->layout('back_layout', ['title' => 'admin Users']) ?>

<?php $this->start('main_content') ?>

<h1>Listing de tous les utilisateurs</h1>

<table class="table table-hover">
         <!-- En tete de tableau -->
         <thead>
            <tr>
               <th>ID</th>
               <th>Username</th>
               <th>Rôle</th>
               <th>Statut</th>
               <th>créé le</th>
               <th>derniere modification le</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody >
            <?php $i = 0;
            foreach ($results as $result)
            { ?>
               <tr>
                  <td class="align-middle py-1" ><?php echo $result['id']; ?></td>
                  <td class="align-middle py-1" ><?php echo $result['username']; ?></td>
                  <td class="align-middle py-1" ><?php echo $result['role']; ?></td>
                  <td class="align-middle py-1" ><?php echo $result['status']; ?></td>
                  <td class="align-middle py-1" ><?php echo $result['created_at']; ?></td>
                  <td class="align-middle py-1" ><?php echo $result['modified_at']; ?></td>
                  <td class="align-middle py-1">
                     <nav class="mt-2">
                        <ul class="nav">
                           <!-- Edition -->
                           <li class="nav-item">
                              <a class="nav-link" href="<?=$this->url('admin_single_user', ['id' => $result['id']] ) ?>">
                                 <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Editer">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                 </button>
                              </a>
                           </li>
                           <!-- Delete -->
                           <li class="nav-item">
                              <a class="nav-link" href="<?=$this->url('admin_delete_user', ['id' => $result['id']] ) ?>">
                                 <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Supprimer">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                 </button>
                                 </button>
                              </a>
                           </li>
                        </ul>
                     </nav>
                  </td>
               </tr>
            <?php } ?>
         </tbody>
      </table>

<?php $this->stop('main_content') ?>
