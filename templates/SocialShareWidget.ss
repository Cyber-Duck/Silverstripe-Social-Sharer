<div id="social-share-widget">

    <div class="social-share-button">
        <a href="#"><span class="social-share-button-image"></span>Share</a>
    </div>

    <div class="social-share-panel">
        <div class="social-share-close">
            <a href="#">X</a>
        </div>
        <p class="social-share-title">Share this page on:</p>
        <ul>
            <% loop SocialNetworks %>
            <li>
                <a href="$Top.SocialSharerUrl($NetworkUrl)" target="_blank">
                    <% with Image %>
                    <img src="$URL" alt="$Title" height="40" width="40" class="social-share-network-image">
                    <% end_with %>
                    $Network
                </a>
            </li>
            <% end_loop %>
        </ul>
        <p class="social-share-copy">Copy page link:</p>
        <input type="text" value="$AbsoluteLink" class="social-share-input">
    </div>

</div>