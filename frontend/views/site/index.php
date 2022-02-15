<?php

/** @var yii\web\View $this */

$this->title = 'My Siakad';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Selamat datang</h1>

        <p class="lead">Sistem Informasi Akademik.</p>

        <!--   <p><a class="btn btn-lg btn-info" href="http://www.yiiframework.com">Get started with Yii</a></p> -->
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <div class="card ">
                   <div class="card-body">
                    <p style="font-size: 14pt;">
                        Data Dosen <br>
                        <?= $jum_dosen; ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
         <div class="card ">
             <div class="card-body">
                 <p style="font-size: 14pt;">
                    Data Mahasiswa <br>
                    <?= $jum_mhs; ?>
                </p>
            </div>
        </div>


    </div>
    <div class="col-lg-4">
        <div class="card ">
            <div class="card-body">
             <p style="font-size: 14pt;">
                Data Mata Kuliah <br>
                <?= $jum_mk; ?>
            </p>
        </div>
    </div>


</div>
</div>

</div>
</div>
