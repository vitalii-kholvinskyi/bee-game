<div align="center">
    <?php if($log): ?>
    <p class="text-center">Hitted: <strong><?= $log::IMPORTANT ? 'Queen' : ucfirst(implode(' ', explode('_', $log->sessName))); ?></strong></p>
    <?php endif; ?>
    <?php if(isset( $_SESSION['game-over'] )): ?>
    <h2 class="text-center">Game over. You win!</h2>
    <?php else: ?>
        <?php foreach($game::$bees as $type => $bees): ?>
            <div>
                <table class="table" cellpadding="10">
                    <tbody>
                        <tr>
                            <?php foreach($bees as $bee): ?>
                            <td>
                                <h3 class="text-center"><?= ($type == 'queen') ? ucfirst($type) : implode(' ', explode('_', $bee->sessName)); ?></h3>
                                <img src="/images/bee-2.png"<?php if(!$bee->isAlive()){ echo ' style="opacity:0.1;"'; } ?> />
                                <div class="progress-bar">
                                    <div class="progress" style="width:<?= $bee->percent(); ?>%;"><?= $bee->percent(); ?>%</div>
                                </div>
                                <h5 class="text-center"><?= $bee->currentLifeSpan.'/'.$bee::LIFESPAN ?></h5>
                            </td>
                            <?php endforeach; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    <form method="post" action="/?a=play" style="margin: 40px;">
        <?php if(!isset( $_SESSION['game-over'] )): ?>
        <button class="button" type="submit" name="hit">
            <i class="fas fa-hand-rock"></i> HIT RANDOM BEE
        </button>
        <?php endif; ?>
        <a href="/?a=play&again=true" class="button">
            <i class="fas fa-redo"></i> PLAY AGAIN
        </a>
    </form>
</div>
