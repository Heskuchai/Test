<div class="container">
	<div class="game-title">
		<ul>
			<li>
				<em class="game-title-l">
					<span>Частые вопросы</span>

				</em>
			</li>
		</ul>
	</div>
	<div class="faq-loop">
		<?php

    foreach ($faq as $f) {
      echo '<h1 style="margin-bottom:5px;margin-top:10px;">'.$f->title.'</h1>';
      echo '<p>'.$f->body.'</p>';
    }

    ?>
</div>
</div>
