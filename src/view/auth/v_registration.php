<main>
    <form method="post" class="mt-4 mb-4 w-25">
        <div class="mb-3">
            <label for="login" class="form-label">Login</label>
            <input type="text" class="form-control" id="login" name="login">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Confirm your password</label>
            <input type="password" class="form-control" id="password_confirm" name="password_confirm">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <?php if (!empty($errors)): ?>
    <?php foreach ($errors as $error): ?>
    <div class="alert alert-danger">
        <?=$error?>
    </div>
    <?php endforeach;?>
    <?php endif;?>
</main>