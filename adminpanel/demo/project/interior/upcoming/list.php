<?php 
include('../../../../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_ADMIN_INCLUDE.'/header.php');
$db = new DBConn();


//Get Here Category List
$getList=$db->ExecuteQuery("SELECT Project_Id,Project_Title,Project_HTitle, Project_Image, Project_Desc,Project_HDesc FROM upcoming_projects WHERE Project_Category=2 ORDER BY Project_Id Desc");
?>
<script type="text/javascript" src="projects.js"></script>
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h4 style="background-color:#9F9; width:200px;padding:5px;"><a href="../ongoing/list.php">Accomplished Projects</a></h4>
      
    </div>
     <div class="title_right">
      <h3>Upcoming Projects </h3> 
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>View List </h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><button class="btn btn-round btn-success" onclick="location.href='index.php';">Add New </button>
                          </li>
                          
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th>No.</th>
                              <th>Title Name</th>
                              <th>Image</th>
                              <th>Description</th>
                             <!-- <th>Langauge</th>-->
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php $i=1; 
						  	if(count($getList)>0)
							{
							  foreach($getList as $val){ ?>
                            <tr>
                              <td><?php echo $i;?></td>
                              <td><?php echo $val['Project_Title'];?></td>
                              <td><?php if(count($val['Project_Image'])>0){ echo '<img src="'.LINK_ROOT.'/image_upload/projects/thumb/'.$val['Project_Image'].'" style="width:50px">'; }else{ echo '<img src="'.LINK_ROOT.'/image_upload/thumb/defult.jpg"  style="width:50px">'; }?></td>
                              <td><?php echo substr($val['Project_Desc'],0,100).'...';?></td>
                             <!-- <td><?php// echo $val['Lang_Name'];?></td>-->
                              <td><a href="edit.php?id=<?php echo $val['Project_Id'];?>">Edit</a> | <a class="delete" href="#" id="<?php echo $val['Project_Id'];?>"> Delete</a></td>
                            </tr>
                            <?php $i++;}}else{ ?>
                            	<tr>
                                	<td align="center" colspan="8">Oops Not Data Found </td>
                                </tr>
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
