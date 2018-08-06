<div class="cell bg-white p-6 mr-4">
    <div class="row">
        <a type="button" href="javascript:history.back();" class="button drop-shadow bg-red fg-white"><span class="mif-arrow-left"></span> Go Back</a>
    </div>
    <div class="row">
        <ul class="cell breadcrumbs" style="margin-bottom:0px;">
            <li class="page-item"><a href="<?php echo base_url('index.php/AdminStart'); ?>" class="page-link">Home</a></li>
            <li class="page-item"><a href="<?php echo base_url('index.php/Masterfile'); ?>" class="page-link">Masterfile</a></li>
            <li class="page-item"><a href="<?php echo base_url('index.php/Scheduler'); ?>" class="page-link">Scheduler</a></li>
        </ul>
        <div class="stub ml-auto">
            <a href="<?php echo base_url('index.php/Scheduler/Add') ?>" class="button bg-darkBlue fg-white win-shadow" name="button">Add new schedule</a>
        </div>
    </div>
    <div class="row">
        <div class="stub">
            <h3>Scheduler</h3>
        </div>
        <div class="stub ml-auto">
            <input type="text" class="win-shadow" data-role="search">
        </div>
    </div>
    <hr class="row thick bg-black drop-shadow">
    <div class="row bg-light">
        <div class="cell">
            <div class="row" id="depContainer">

            </div>
        </div>
    </div>
</div>
</div>
</div>
<script>
</script>
</body>
</html>
