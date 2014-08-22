<h2><?php echo Utils::t('Newsletter Signup'); ?></h2>
<form role="form" method="POST" action="/?action=newsletter">
    <div class="form-group">
        <label for="inputName"><?php echo Utils::t('Name'); ?></label>
        <input type="name" class="form-control" name="name" id="inputName" placeholder="">
    </div>
    <div class="form-group">
        <label for="inputEmail"><?php echo Utils::t('Email'); ?></label>
        <input type="email" class="form-control" name="email" id="inputEmail" placeholder="">
    </div>
    <div class="form-group">
        <label for="inputPhone"><?php echo Utils::t('Phone'); ?></label>
        <input type="text" class="form-control" name="phone" id="inputPhone" placeholder="">
    </div>
    <div class="form-group">
        <label for="inputAddress"><?php echo Utils::t('Address'); ?></label>
        <textarea class="form-control" name="address" id="inputAddress" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-primary btn-lg"><?php echo Utils::t('Sign Up'); ?></button>
</form>