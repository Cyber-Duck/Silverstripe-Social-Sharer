<div class="social-sharer">

	<div class="social-sharer-button">
		<a href="#"><span class="share-image"></span>Share</a>
	</div>

	<div class="social-sharer-links">
		<div class="social-sharer-close">
			<a href="#">X</a>
		</div>
		<p class"sharer-title">Share this page on:</p>
		<ul>
			<% loop Top.SocialSharer %>
			<li>
				<a href="$Top.SocialSharerUrl($NetworkUrl)" target="_blank">
					<% with Image %>
					<img src="$URL" alt="$Title" height="40" width="40" class="network-image">
					<% end_with %>
					$Network
				</a>
			</li>
			<% end_loop %>
		</ul>
		<p class"sharer-sub">Copy page link:</p>
		<input type="text" value="$AbsoluteLink">
	</div>

</div>