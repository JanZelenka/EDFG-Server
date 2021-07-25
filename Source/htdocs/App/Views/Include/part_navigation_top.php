<?php
/**
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 *
 */

?>
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
</nav>

<?php
/**
/* Other project code, kept for quick copy-paste of elements
 * @todo Remove before publishing
 */
/*
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#part_nav_top_content" aria-controls="part_nav_top_content" aria-expanded="false" aria-label="<?= lang( 'Navigation.toggleNavigation' ) ?>">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="part_nav_top_content">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
				<a class="nav-link" href="<?= base_url( 'courses') ?>"><?= lang( 'Navigation.courseList' ) ?></a>
			</li><?php
	endif;?>
  			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="part_nav_top_languages" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= lang( "Languages.$locale" ) ?></a>
				<div class="dropdown-menu" aria-labelledby="part_nav_top_languages">
					<button class="dropdown-item languageSwitch" data-language="en"><?= lang( "Languages.en" ) ?></button>
					<button class="dropdown-item languageSwitch" data-language="nl"><?= lang( "Languages.nl" ) ?></button>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a
						class="nav-link dropdown-toggle"
						href="#"
						id="partNavTopParticipant"
						role="button"
						data-toggle="dropdown"
						aria-haspopup="true"
						aria-expanded="false"
						><?= $Participant->NameFirst . ' ' . $Participant->NameLast ?></a>
				<div class="dropdown-menu" aria-labelledby="partNavTopParticipant">
					<a
							class="dropdown-item"
							href="<?= base_url( 'person/profile/' . $Participant->fmMetaData()->recordId ) ?>"
							>
						<svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
						</svg>
						<?= lang( 'Navigation.editProfile' ) ?>
					</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="<?= base_url( 'person/profile/new' ) ?>">
						<svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-person-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10zM13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
						</svg>
						<?= lang( 'Navigation.participantNew' ) ?>
					</a><?php
	if ( is_array( $participants ) ):?>
					<a
							class="dropdown-item"
							href="<?= base_url( 'courses/participant/' . $User->fmMetaData()->recordId ) ?>"
							>
						<svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-card-checklist" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
							<path fill-rule="evenodd" d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
						</svg>
						<?= $User->NameFirst . ' ' . $User->NameLast ?>
					</a><?php

		/** @var \App\Entities\Person $PotentialParticipant
		foreach ($participants as $intRecordId => $PotentialParticipant ):?>
					<a
							class="dropdown-item"
							href="<?= base_url( 'courses/participant/' . $intRecordId ) ?>"
							>
						<svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-card-checklist" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
							<path fill-rule="evenodd" d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
						</svg>
						<?= $PotentialParticipant->NameFirst . ' ' . $PotentialParticipant->NameLast ?>
					</a><?php
		endforeach;
	endif;?>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="<?= base_url( 'logout' ) ?>">
						<svg class="bi bi-box-arrow-right" width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M11.646 11.354a.5.5 0 0 1 0-.708L14.293 8l-2.647-2.646a.5.5 0 0 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0z"/>
							<path fill-rule="evenodd" d="M4.5 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5z"/>
							<path fill-rule="evenodd" d="M2 13.5A1.5 1.5 0 0 1 .5 12V4A1.5 1.5 0 0 1 2 2.5h7A1.5 1.5 0 0 1 10.5 4v1.5a.5.5 0 0 1-1 0V4a.5.5 0 0 0-.5-.5H2a.5.5 0 0 0-.5.5v8a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5v-1.5a.5.5 0 0 1 1 0V12A1.5 1.5 0 0 1 9 13.5H2z"/>
						</svg>
						<?= lang( 'Navigation.signout' ) ?>
					</a>
				</div>
			</li>
		</ul><?php
endif;?>
	</div>
</nav>
<div class="sticky-top p-1 bg-light menuLine2">
	<div><?= lang( 'Messages.keepProfileUpdated' ) ?></div>
	<div>
		<a href="<?= base_url( '/documents/quickguide') ?>">
			<svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-question-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
				<path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
			</svg>
			<?= lang( 'Navigation.quickGuideLink' ) ?>
		</a>
	</div>
</div>
*/
?>