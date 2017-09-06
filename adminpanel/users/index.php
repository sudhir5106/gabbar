<?php 
include('../../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();
require_once(PATH_ADMIN_INCLUDE.'/header.php');

$res = $db->ExecuteQuery("SELECT User_Name, User_Email, User_Mobile, User_Password, User_Address FROM user_registration");

?>
<script src="tracks.js"></script>

<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>List of Users</h3>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_title">
       <h2>View List </h2>
       <div class="clearfix"></div>
    </div>
    
    <div>
    	<table class="table table-bordered table-striped table-hover">
        	<tr class="success">
            	<th>Sno.</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Mobile No</th>
                <th>Address</th>
                <th>Shipping Address</th>
            </tr>
            <?php 
			$i=1;
			foreach($res as $val){ ?>
            <tr>
            	<td><?php echo $i; ?></td>
                <td><?php echo $val['User_Name']; ?></td>
                <td><?php echo $val['User_Email']; ?></td>
                <td><?php echo $val['User_Password']; ?></td>
                <td><?php echo $val['User_Mobile']; ?></td>                
                <td><?php echo $val['User_Address']; ?></td>
                <td><?php echo $val['User_Address']; ?></td>
            </tr>
            <?php $i++;} ?>
        </table>
    </div>
    
    <div id="deletemsg" title="Message" style="display:none; text-align:left;">
      <p>You can not delete </p>
    </div>
  </div>
</div>
<?php 
require_once(PATH_ADMIN_INCLUDE.'/footer.php');

?>
