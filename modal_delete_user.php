<!-- Delete User Modal -->
<div class="modal fade" id="delete<?php  echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-content">
      <div class="modal-header">
        <!---<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
        <h4 class="modal-title" id="myModalLabel">Delete User</h4>
      </div>
      <div class="modal-body">
			<div class="alert alert-danger">
				Are you sure you want to delete user <span class="label-primary label label-default"><?php echo $row['fname']." ".$row['lname']; ?></span> ?
			</div>
			<div class="modal-footer">
			<button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove icon-white"></i> No</button>
			<a href="delete_user_query.php<?php echo '?user_id='.$id; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</a>
			</div>
    
    </div>
  </div>
</div>