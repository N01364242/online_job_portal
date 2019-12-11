<?php

require_once 'Database.php';
$dbcon = Database::getDb();

$sql = "select * from job_post join job_type on job_post.job_type_id = job_type.id 
                                  join location on job_post.joblocation_id = location.loc_id where is_active = 'y'";

$pdostm = $dbcon->prepare($sql);
$pdostm->setFetchMode(PDO::FETCH_OBJ);
$pdostm->execute();

?>

<div id="center_column" class="clearfix equal_height">
    <div id="listings_module" class="table-responsive" style="padding: 20px;">
        <table class="table table-hover" id="dtBasicExample" style="width:90%; margin: auto;">
            <thead>
            <tr>
                <th class="listings_title">Job Title</th>
                <th class="listings_type">Type</th>
                <th class="listings_pay">Pay</th>
                <th class="listings_area">City</th>
            </tr>
            </thead>
            <tbody>
            <?php
                foreach ($pdostm as $job){ ?>

                    <tr class="clickable_button">
                        <td class="listings_title">

                            <h5><a href="jobdescription.php?id=<?php echo $job->job_id;?>"><input type="hidden" name="id" value="">
                                    <?php echo $job->job_title?></a></h5>
                        </td>
                        <td class="listings_type">
                            <p class="compensation"><?php echo $job->job_type?></p>
                        </td>
                        <td class="listings_pay">
                            <p class="compensation"><?php echo $job->salary?></p>
                        </td>
                        <td class="listings_area">
                            <p class="city"><?php echo $job->CITY?></p>
                        </td>
                    </tr>

              <?php  } ?>

            </tbody>
        </table>
    </div>
</div>

<script>

    // Basic example
    $(document).ready(function () {
        $('#dtBasicExample').DataTable( {
            "pagingType": "full_numbers"
        } );
        $('.dataTables_length').addClass('bs-select');
    });

</script>




<!--
<div class="search_nav">
    <ul class="pagination" style="margin-left: 500px;">
        <li class="prev_results">
            <p>Prev</p>
        </li>


        <li class="inactive">1</li>


        <li><a class="text_link" href="">2</a></li>


        <li><a class="text_link" href="">3</a></li>


        <li class="inactive">...</li>


        <li><a class="text_link" href="?page=10">10</a></li>


        <li class="next_results">
            <a href="?page=2"><span class="text_link">Next</span></a>

        </li>
    </ul>
</div>-->

