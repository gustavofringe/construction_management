<?php
function dd($var)
{
    $debug = debug_backtrace();
    ?>
    <div class="container">
                <pre>
                    <strong>Debug</strong>
                        <p><?= print_r($var); ?></p>
                    <p>______________________________________________________________________________________________________</p>
                    <strong>Debug_backtrace</strong>
                    <p>&nbsp;</p><p><a href="#"
                                       onclick="$(this).parent().next('ol').slideToggle(); return false;"><strong><?= $debug[0]['file']; ?> </strong><?= $debug[0]['line']; ?></a></p>
                    <ol>
                     <?php foreach ($debug as $k => $v): ?>
                         <p><strong>Call file-> </strong> <?= $v['file']; ?>
                             <strong>at line-> </strong><?= $v['line']; ?></p>
                         <p><strong>With object-></strong> <?php print_r(isset($v['object']) ? $v['object'] : $v['args']); ?></p>
                     <?php endforeach; ?>

                    </ol>
                </pre>
    </div>
    <?php
    //die();
}