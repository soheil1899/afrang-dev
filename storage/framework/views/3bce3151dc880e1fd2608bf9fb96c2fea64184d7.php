
<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo app('translator')->getFromJson('site.Login Page'); ?></title>

    <!-- Fonts -->
    <link href="/css/login.css" rel="stylesheet" type="text/css">

</head>
<body>
<div class="loginpage" id="login" >
    <div class="loginpage" id="login" dir="" >

        <?php if(Route::has('login')): ?>
            <div class="loginbxo" >
                <div class="row">
                    <div class="col-sm-4 sidelogin2" >

                    </div>
                    <div class="col-sm-8 padding" dir="rtl">
                        <form method="POST" action="<?php echo e(route('register')); ?>" dir="rtl" class="text-right">
                            <?php echo csrf_field(); ?>
                            <h3 class="text-right"><?php echo app('translator')->getFromJson('site.Register'); ?></h3>
                            <hr>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('site.name')); ?></label>
                                <div class="col-md-6">
                                    <input id="name"  class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="name" value="<?php echo e(old('name')); ?>" required>

                                    <?php if($errors->has('name')): ?>
                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right"><?php echo e(__('site.mobile')); ?></label>
                                <div class="col-md-6">
                                    <input id="phone" class="form-control<?php echo e($errors->has('mobile') ? ' is-invalid' : ''); ?>" name="mobile" value="<?php echo e(old('mobile')); ?>" required>

                                    <?php if($errors->has('mobile')): ?>
                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('mobile')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right"><?php echo e(__('site.E-Mail Address')); ?></label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required>

                                    <?php if($errors->has('email')): ?>
                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right"><?php echo e(__('site.Password')); ?></label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>

                                    <?php if($errors->has('password')): ?>
                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><?php echo e(__('site.Confirm Password')); ?></label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary ">
                                        <?php echo e(__('site.Register')); ?>

                                    </button>
                                    <a  class="btn btn-success" href="/login">
                                        <?php echo e(__('site.IhaveAccount')); ?>

                                    </a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        <?php endif; ?>

    </div>

</div>

    <script src="/js/login.js"></script>
</body>
</html>


