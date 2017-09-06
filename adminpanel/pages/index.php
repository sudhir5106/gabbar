<?php 
include('../../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();
require_once(PATH_ADMIN_INCLUDE.'/header.php');


//Get Here Category List
$getCategory=$db->ExecuteQuery("SELECT P.Details, M.Menu_Name, M.File_Name, P.Pages_Id, M.Defualt_Menu FROM pages P INNER JOIN menu M ON P.Menu_Id=M.Menu_Id ORDER BY Pages_Id  Desc");
?>
<script type="text/javascript" src="pages.js"></script>
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3> Pages </h3>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>View List</h2>
                         <small></small>
                          <ul class="nav navbar-right panel_toolbox">
                            <li>
                            
                              <button class="btn btn-round btn-success" onclick="location.href='addnew.php';">View List</button>
                            </li>
                          </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th>No.</th>
                              <th>Menu Name </th>
                              <th>File Name</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php $i=1; if(count($getCategory)>0){ foreach($getCategory as $val){ ?>
                            <tr>
                              <td><?php echo $i;?></td>
                              <td><?php echo $val['Menu_Name'];?></td>
                              <td><?php echo $val['File_Name'];?></td>
                          	   <td> <a href="edit.php?id=<?php echo $val['Pages_Id'];?>">Edit</a>  <?php if($val['Defualt_Menu']!=1){ ?>| <a class="delete" href="#" id="<?php echo $val['Pages_Id'];?>"> Delete</a><?php } ?></td>
                            
                            </tr>
                            <?php $i++;}}else{ ?>
                            <tr><td colspan="6" align="center">Oops No Data Found</td></tr>
                            <?php } ?>
                          </tbody>
                        </table>
						<div id="deletemsg" title="Message" style="display:none; text-align:left;">
                            <p>You can not delete this category , <br/> becouse this category is used in sub-category</p>
                        </div>
                      </div>
                    </div>
                  </div>
  </div>

<?php 
require_once(PATH_ADMIN_INCLUDE.'/footer.php');

?>
