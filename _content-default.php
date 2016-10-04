<div class="container">

    <div class="alert alert-success text-center" role="alert">
        You played <strong><?php echo $riddle->riddle->title; ?></strong> 
        with the RIDDLE ID <strong><?php echo $riddle->riddle->id; ?></strong>
        and TYPE <strong><?php echo $riddle->riddle->type; ?></strong>
    </div>

    <div class="jumbotron text-center">
        <h1><?php echo $riddle->riddle->title; ?></h1>
        <?php if (isset($riddle->riddle->description)): ?>
            <p class="lead"><?php echo $riddle->riddle->description; ?></p>
        <?php endif; ?>
    </div>   

    <?php if ($riddle->answers): ?>
        <div class="page-header text-center">
            <h2>Questions and answers</h2>
        </div>
        <div class="list-group">
            <?php $numberAnswers = count($riddle->answers); ?>
            <?php foreach ($riddle->answers as $_k => $_answer): ?>
                <?php $_count = ($_k + 1) . '/' . $numberAnswers; ?>
                <a href="#" class="list-group-item">
                    <?php if ('quiz' === $riddle->riddle->type): ?>                    
                        <span class="badge" style="background:<?php echo $_answer->correct ? 'green' : 'red'; ?>">
                            <?php echo $_answer->correct ? 'Correct' : 'Wrong'; ?>
                        </span>
                    <?php endif; ?>
                    <h4 class="list-group-item-heading">
                        <?php echo $_k + 1; ?>. <?php echo $_answer->question; ?>
                    </h4>
                    <p class="list-group-item-text">
                        <?php echo $_answer->answer; ?>
                    </p>                    
                </a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <div class="page-header text-center">
        <h2>Lead data</h2>
    </div>
    <?php if ($riddle->lead): ?>
        <div class="list-group">       
            <?php foreach ($riddle->lead as $_field => $_value): ?>
                <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading">
                        <?php echo $_field; ?>
                    </h4>
                    <p class="list-group-item-text">
                        <?php echo $_value; ?>
                    </p> 
                </a>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p><i>No lead data</i></p>
    <?php endif; ?>

    <div class="page-header text-center">
        <h2>For developers: dumping passed data</h2>
    </div>       
    <pre><?php var_dump($riddle); ?></pre>
</div>