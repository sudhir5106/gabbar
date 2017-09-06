<?php 
include('../../../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_ADMIN_INCLUDE.'/header.php');
$db = new DBConn();


/*//Get Here Category List Old code
$getCategory=$db->ExecuteQuery("SELECT Category_Id, Category_Name , Position, Lang_Name FROM category CG INNER JOIN langauge LG ON LG.Id=CG.Langauge ORDER BY Category_Name ASC");*/

$getCategory=$db->ExecuteQuery("SELECT Category_Id, Category_Name , Position FROM catelog_category ORDER BY Category_Id ASC")
?>
<script type="text/javascript" src="category.js"></script>
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3> Category </h3>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>View List </h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><button class="btn btn-round btn-success" onclick="location.href='index.php';">Add New Category</button>
                          </li>
                          
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th>No.</th>
                              <th>Category Name</th>
                              <th>Position</th>
                              <!--<th>Langauge</th>-->
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php $i=1; foreach($getCategory as $val){ ?>
                            <tr>
                              <td><?php echo $i;?></td>
                              <td><?php echo $val['Category_Name'];?></td>
                              <td><?php echo $val['Position'];?></td>
                             <!-- <td><?php// echo $val['Lang_Name'];?></td>-->
                              <td><a href="edit.php?id=<?php echo $val['Category_Id'];?>">Edit</a> | <a class="delete" href="#" id="<?php echo $val['Category_Id'];?>"> Delete</a></td>
                            </tr>
                            <?php $i++;} ?>
                            
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
