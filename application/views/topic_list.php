<button onclick="location.href='/topic/write'">글 작성하기</button>

<ul>
	<?php
	foreach ($topics as $entry) {
		?>
		<li><a href="/topic/get/<?=$entry['id']?>"> <?=$entry['title'] ?></a></li>
		<?php
	}
	?>
</ul>


