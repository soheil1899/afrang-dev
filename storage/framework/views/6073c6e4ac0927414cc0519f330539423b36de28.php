
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

        <?php if(Route::has('login')): ?>
              <div class="loginbxo">
                  <div class="row">
                      <div class="col-sm-4 sidelogin"  dir="rtl">

                      </div>
                        <div class="col-sm-8 padding">
                            <form method="POST" @submit="submitform($event)" dir="rtl">
                                <?php echo csrf_field(); ?>
                                <h3 class="text-right"><?php echo app('translator')->getFromJson('site.Login '); ?></h3>
                                <hr>
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right"><?php echo e(__('site.E-Mail Address')); ?></label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" v-model="email"  required autofocus>

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
                                        <input id="password" type="password" class="form-control" v-model="password" required>

                                        <?php if($errors->has('password')): ?>
                                            <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-0 text-right " dir="rtl">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            <?php echo e(__('site.Login')); ?>

                                        </button>
                                        <a href="/register" type="submit" class="btn btn-danger">
                                            <?php echo e(__('site.Register')); ?>

                                        </a>
                                        <?php if(Route::has('password.request')): ?>
                                            <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                                                <?php echo e(__('site.Forgot Your Password?')); ?>

                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <ul v-if="error != null">
                                    <li v-for="item in error">{{ item[0] }}</li>
                                </ul>
                            </form>

                        </div>
                  </div>
              </div>
       <?php endif; ?>

</div>
<script src="/js/login.js"></script>
</body>
</html>
