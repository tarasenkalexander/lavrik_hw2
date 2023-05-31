<main>
    <form method="post" class="mt-4 mb-4 w-25">
        <div class="mb-3">
            <label for="loginInput" class="form-label">Login</label>
            <input type="text" class="form-control" id="loginInput" name="loginInput">
        </div>
        <div class="mb-3">
            <label for="passwordInput" class="form-label">Password</label>
            <input type="password" class="form-control" id="passwordInput" name="passwordInput">
        </div>
        <div class="mb-3 form-check">
            <label for="isRemember" class="form-check-label">Remember me</label>
            <input type="checkbox" class="form-check-input" id="isRemember" name="isRemember">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php if(!$isLogged): ?>
        <div class="alert alert-danger">
            Login or password is wrong
        </div>
    <?php endif; ?>
</main>