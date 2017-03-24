<form action="" method="post">
    <div class="form-group">
        <label>Project</label>
        <select name="project" class="form-control">
            <?php for ($i = 0; $i < count($projects); $i++) { ?>
                <option value="<?php echo $projects[$i]['projectID'] ?>"><?php echo $projects[$i]['title'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label>Users</label>
        
        <select name="user" class="form-control">
            <?php for ($i = 0; $i < count($users); $i++) { ?>
                <option value="<?php echo $users[$i]['userID'] ?>"><?php echo $users[$i]['username'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Assing User</button>
    </div>
</form>