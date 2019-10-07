<?php
$title = 'ASLCN';
require('html.php');
require('template.php'); 
?>



<a class="back_link" href="<?= $_POST['URL_PATH'] ?>profil"> Retour au profil</a>

<div class="article">
		<div class="first_line_header clearfix">
			<div class="header_title_1">
				<span class="header_title_text">Rencontre 1</span>
			</div>
			<div class="header_title_2">
				Course à pied
			</div>
		</div>
		<div class="second_line_header clearfix">
			<div class="vote " id="vote_1" data-ref="ARTICLE" data-ref_id="1">
				<div class="vote_btns">
                    <p>Present</p>
                    <button class="vote_btn vote_like" value="$_POST['id']" ><span id="like_count_1">0</span></button>
                    <p>Absent</p>
					<button class="vote_btn vote_dislike"><span id="dislike_count_1">0</span></button>
				</div>
			</div>
		</div>
	</div>
	<div class="article">
		<div class="first_line_header clearfix">
			<div class="header_title_1">
				<span class="header_title_text">Rencontre 2</span>
			</div>
			<div class="header_title_2">
				Tir a l'arc
			</div>
		</div>
		<div class="second_line_header clearfix">
			<div class="vote " id="vote_2" data-ref="ARTICLE" data-ref_id="2">
				<div class="vote_btns">
                    <p>Present</p>
                    <button class="vote_btn vote_like"><span id="like_count_2">0</span></button>
                    <p>Absent</p>
					<button class="vote_btn vote_dislike"><span id="dislike_count_2">0</span></button>
				</div>
			</div>
		</div>
	</div>
	<div class="article">
		<div class="first_line_header clearfix">
			<div class="header_title_1">
				<span class="header_title_text">Rencontre 3</span>
			</div>
			<div class="header_title_2">
				Hand
			</div>
		</div>
		<div class="second_line_header clearfix">
			<div class="vote " id="vote_3" data-ref="ARTICLE" data-ref_id="3">
				<div class="vote_btns">
                    <p>Present</p>
                    <button class="vote_btn vote_like"><span id="like_count_3">0</span></button>
                    <p>Absent</p>
					<button class="vote_btn vote_dislike"><span id="dislike_count_3">0</span></button>
				</div>
			</div>
		</div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
	<script src="/aslcn/public/js/pres.js"></script>
	<script src="/aslcn/public/js/vote.js"></script>

