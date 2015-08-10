<?php
/**
 * Created by PhpStorm.
 * User: sun
 * Date: 15-7-12
 * Time: 下午6:33
 */

use yii\helpers\Html;

if(isset($terms)){
    ?>
        <div class="container">
            <?php
                foreach($terms as $term){
                    ?>
                        <div class="row">
                            <div class="col-md-2">
                                <span class="course-terms-parent <?=($current == $term['parent']->slug?'current':'')?>"><?= Html::encode($term['parent']->title);?></span>
                            </div>
                            <div class="col-md-10">
                                <ul class="course-terms-children">
                                    <?php foreach($term['children'] as $child){
                                      echo '<li class="course-term-li '.($current == $child->slug?'current':'').'">' . Html::a($child->title, ['@web/course/default/index', 'slug' => $child->slug]) . '</li>';
                                    }?>
                                </ul>
                            </div>
                        </div>      
                    <?php
                }
            ?>
            
        </div>
    <?php        
}