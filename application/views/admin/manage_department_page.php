<div class="cell bg-white p-3 ml-4">
    <div class="row">
        <a href="javascript:history.back();" class="button stub bg-red fg-white"><span class="mif-arrow-left"></span> Go Back</a>
        <div class="stub ml-auto no-visible">
            <div class="row">
                <h5 class="cell mt-3">Days left para defend:</h5>
                <div class="cell" data-role="countdown"  data-date="09/25/2018"
                     data-days="1"
                     data-hours="2"
                     data-minutes="3"
                     data-seconds="4"></div>
            </div>

        </div>
    </div>
    <div class="row">
        <ul class="cell breadcrumbs" style="margin-bottom:0px;">
            <li class="page-item"><a href="<?php echo base_url('index.php/AdminStart'); ?>" class="page-link">Home</a></li>
            <li class="page-item"><a href="#" class="page-link">Masterfile</a></li>
            <li class="page-item"><a href="#" class="page-link">Department</a></li>
            <li class="page-item"><a href="#" class="page-link">Add</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="stub">
            <h4>Manage Department</h4>
        </div>
        <div class="stub ml-auto">
            <a class="button bg-darkBlue fg-white">VIEW ALL DEPARTMENT</a>
        </div>
    </div>
    <hr class="row thick bg-black drop-shadow">
    <div class="row">
        <div class="cell mr-4">
            <div class="row">

            </div>
        </div>
    </div>
</div>
</div>
</div>

<script>
    $(document).ready(function(){
        $(window).on("load",function(){
            $('body').mCustomScrollbar({
                scrollButtons:{enable:true,scrollType:"stepped"},
				keyboard:{scrollType:"stepped"},
				mouseWheel:{scrollAmount:188},
				theme:"rounded-dark",
				autoExpandScrollbar:true,
				snapAmount:188,
				snapOffset:65
    		});
        });
    });
</script>
</body>
</html>
