<script>
	// @ts-nocheck
	import { onMount } from 'svelte';
	import Card from './../components/card.svelte';

	const projects = [
		{
			id: 1,
			name: 'SafeArea',
			url: 'safearea.fr',
			image: 'ratio',
			tittle: 'Safe Area',
			description:
				"Safearea est une application web permettant aux employés d'entreprises de déposer des plaintes 	vis à vis de comportement innapropriés",
			git: '',
			logos: ['laravel-2.svg', 'mysql-logo.svg', 'vue-9.svg']
		},
		{
			id: 2,
			name: 'MonsterBlitz',
			url: '',
			image: 'ratio',
			tittle: 'Monster Blitz',
			description:
				"Jeux mobile dans le cadre d'un projet de cour, infinite scroller à la maniere de subway surfer.",
			git: '',
			logos: ['unity-69.svg', 'c--.svg']
		},
		{
			id: 3,
			name: 'Blind test',
			url: '',
			image: 'ratio',
			tittle: 'Blind test',
			description:
				"Jeux web développé en react dans le cadre d'un projet de cour sur le theme de la music, les joueurs se regrouppent dans des salles et devinnent des musiques.",
			git: '',
			logos: ['react-2.svg', 'nodejs.svg']
		}
	];

	let currentSection = 0;
	const sections = [];
	let cursor = null;
	let insideCursor = null;
	let body;
	let cardsRef = [];

	let textarea = null;

	//mouse speed
	let lastMouseX = 0;
	let lastMouseY = 0;
	let speedX = 0;
	let speedY = 0;
	let marge;
	let cas = 0;
	let ratioratio = 1;

	let scrollLevel = 0;
	//____________________________________
	let elementToAnimate;
	let elementToAnimate2;
	let elementToAnimate3;
	let isinter = false;
	let isinter2 = false;
	let isinter3 = false;

	function mailto() {
		const mailtoLink = `mailto:jules.besson7@gmail.com`;
		window.location.href = mailtoLink;
	}

	const observeElement = () => {
		const observer = new IntersectionObserver((entries) => {
			entries.forEach((entry) => {
				if (entry.isIntersecting) {
					isinter = true;
				} else {
					isinter = false;
				}
			});
		});

		const observer2 = new IntersectionObserver((entries) => {
			entries.forEach((entry) => {
				if (entry.isIntersecting) {
					isinter2 = true;
				} else {
					isinter2 = false;
				}
			});
		});

		const observer3 = new IntersectionObserver((entries) => {
			entries.forEach((entry) => {
				if (entry.isIntersecting) {
					isinter3 = true;
				} else {
					isinter3 = false;
				}
			});
		});

		observer.observe(elementToAnimate);
		observer2.observe(elementToAnimate2);
		observer3.observe(elementToAnimate3);
	};
	//____________________________________

	const ddddd = () => {
		let msg = textarea.value;
		msg = msg.replace(/ /g, ' ');
		textarea.value = encodeURIComponent(msg);
	};

	const handleScroll = (e) => {
		if (e.deltaY > 0 && currentSection < sections.length - 1) {
			currentSection++;
		} else if (e.deltaY < 0 && currentSection > 0) {
			currentSection--;
		}
		scrollToSection(currentSection);
	};

	const handleMouseMove = (e) => {
		const currentMouseX = e.clientX;
		const currentMouseY = e.clientY;
		scrollLevel = window.scrollY;
		if (lastMouseX !== undefined && lastMouseY !== undefined) {
			const deltaX = Math.abs(currentMouseX - lastMouseX);
			const deltaY = Math.abs(currentMouseY - lastMouseY);
			const speed = Math.sqrt(deltaX * deltaX + deltaY * deltaY); // Magnitude de la vitesse

			// Ajustez le diamètre du curseur en fonction de la vitesse
			let cursorDiameter = Math.max(40 + speed * 3, 20); // Taille minimale de 20px
			if (cursorDiameter > 200) {
				cursorDiameter = 200;
			}
			marge = Math.floor(cursorDiameter / 3);
			cursor.style.width = `${cursorDiameter * ratioratio}px`;
			cursor.style.height = `${cursorDiameter * ratioratio}px`;
		}

		cursor.style.left = `${currentMouseX - marge}px`;
		cursor.style.top = `${currentMouseY - marge + scrollLevel}px`;

		insideCursor.style.left = `${currentMouseX - 5}px`;
		insideCursor.style.top = `${currentMouseY - 5 + scrollLevel}px`;

		lastMouseX = currentMouseX;
		lastMouseY = currentMouseY;
	};

	function mouseEnterButtonNavBar() {
		cursor.style.visibility = 'hidden';
	}

	function nnn() {
		insideCursor.style.backgroundColor = 'black';
		cursor.style.backgroundColor = '#2f2f31';
		cursor.style.mixBlendMode = 'normal';
		ratioratio = 2;
	}

	function nnnn() {
		insideCursor.style.backgroundColor = 'white';
		cursor.style.backgroundColor = 'white';
		cursor.style.mixBlendMode = 'difference';
		ratioratio = 1;
	}

	// function test() {
	// 	for (let i = 0; i < cardsRef.length; i++) {
	// 		console.log(cardsRef[i].children[0]);
	// 	}
	// }

	function mouseLeaveButtonNavBar() {
		cursor.style.visibility = 'visible';
	}

	function scrollToSection(index) {
		const targetPosition = sections[index].offsetTop;
		window.scrollTo({
			top: targetPosition,
			behavior: 'smooth'
		});
	}
	onMount(observeElement);
</script>

<!-- svelte-ignore a11y-click-events-have-key-events -->
<!-- svelte-ignore a11y-no-noninteractive-element-interactions -->

<svelte:head>
	<title>jules besson</title>
</svelte:head>

<body bind:this={body} role="application" on:mousemove={handleMouseMove}>
	<div class="absoluteElements">
		<div bind:this={cursor} class="circleMouse" />
		<div bind:this={insideCursor} class="insideCircle" />
		<div class="navbarDiv">
			<!-- svelte-ignore a11y-mouse-events-have-key-events -->
			<button
				on:mouseleave={mouseLeaveButtonNavBar}
				on:mouseenter={mouseEnterButtonNavBar}
				on:click={scrollToSection.bind(this, 0)}
				class="navbarButton">Welcome</button
			>
			<div class="spacerNavbar" />
			<button
				on:mouseleave={mouseLeaveButtonNavBar}
				on:mouseenter={mouseEnterButtonNavBar}
				on:click={scrollToSection.bind(this, 1)}
				class="navbarButton">About Me</button
			>
			<div class="spacerNavbar" />
			<button
				on:mouseleave={mouseLeaveButtonNavBar}
				on:mouseenter={mouseEnterButtonNavBar}
				on:click={scrollToSection.bind(this, 2)}
				class="navbarButton">Projects</button
			>
			<div class="spacerNavbar" />
			<button
				on:mouseleave={mouseLeaveButtonNavBar}
				on:mouseenter={mouseEnterButtonNavBar}
				on:click={scrollToSection.bind(this, 4)}
				class="navbarButton">Contacts</button
			>
		</div>
	</div>

	<div class="section" id="sec1" bind:this={sections[0]}>
		<div class="MainTittleSection">
			<h1 class="TitleSection" id="mainTittle">WELCOME</h1>
		</div>
	</div>

	<div class="section" id="sec3" bind:this={sections[1]}>
		<div id="AboutMeSection">
			<div bind:this={elementToAnimate2} id="rrrrrrrr">
				{#if isinter2}
					<p class="TitleSection animate-test" id="aboutMeTittle">ABOUT ME</p>
				{:else}
					<p class="TitleSection" id="aboutMeTittle">ABOUT ME</p>
				{/if}
			</div>
			<div id="aboutUnderSection">
				<p id="aboutMeP">
					Passionate about IT and from my deep interest in development, I am looking for a
					work-study program in web development for a period of 3 years. My commitment, my curiosity
					and my desire to learn make me a candidate determined to actively contribute to your
					company.
				</p>
			</div>
		</div>
	</div>

	<div class="section" id="sec2" bind:this={sections[2]}>
		<div id="UnderSection1sec2">
			<div class="MainTittleSection">
				<div bind:this={elementToAnimate} />
				{#if isinter}
					<p id="projectTittle" class="animate-test TitleSection">Project</p>
				{:else}
					<p id="projectTittle" class="TitleSection">Project</p>
				{/if}
			</div>
			<div id="cardSection">
				{#each projects as project, index}
					<!-- svelte-ignore a11y-no-static-element-interactions -->
					<!-- bind:this={cardsRef[index]} -->
					<div
						id="divWrapper"
						bind:this={cardsRef[index]}
						on:mouseleave={mouseLeaveButtonNavBar}
						on:mouseenter={mouseEnterButtonNavBar}
					>
						<Card first={project.tittle} second={project.description} logos={project.logos} />
					</div>
				{/each}
			</div>
		</div>
	</div>

	<div class="section" id="sec1" bind:this={sections[4]}>
		<div id="ContactSection">
			<div bind:this={elementToAnimate3} id="rrrrrrrr">
				{#if isinter3}
					<!-- svelte-ignore a11y-click-events-have-key-events -->
					<!-- svelte-ignore a11y-no-noninteractive-element-interactions -->
					<p
						on:click={mailto}
						on:mouseenter={nnn}
						on:mouseleave={nnnn}
						class="TitleSection animate-test"
						id="contactMeTittle"
					>
						CONTACT ME
					</p>
				{:else}
					<!-- svelte-ignore a11y-click-events-have-key-events -->
					<!-- svelte-ignore a11y-no-noninteractive-element-interactions -->
					<p
						on:click={mailto}
						on:mouseenter={nnn}
						on:mouseleave={nnnn}
						class="TitleSection"
						id="contactMeTittle"
					>
						CONTACT ME
					</p>
				{/if}
			</div>
			<!-- <div id="ContactUnderSection">
				<form action="mailto:jules.besson7@gmail.com" id="mailForm" enctype="text/plain" onsubmit="{ddddd}">
					<input type="text" class="mailInput" name="subject" placeholder="Objet" required />
					<textarea bind:this={textarea} name="body" placeholder="Message" id="mailarea" required />
					<button on:click={ddddd} id="mailbutton" type="submit">Envoyer</button>
				</form>
			</div> -->
		</div>
	</div>
</body>

<!-- 
	----colors----
	
	black : 141416
	grey : 2f2f31
	
-->

<style>
	@import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;500&display=swap');

	* {
		font-family: 'Roboto', sans-serif;
		padding: 0;
		margin: 0;
		cursor: none;
		overflow-x: hidden;
	}

	*::-webkit-scrollbar {
		scrollbar-width: 0;
		display: none;
	}

	input {
		appearance: auto;
		-webkit-appearance: auto;
		-moz-appearance: auto;
		border: initial;
		margin: initial;
		color: initial;
		line-height: initial;
		outline: initial;
		box-shadow: initial;
	}

	body {
		padding: 0;
		margin: 0;
	}

	.navbarButton {
		min-width: 70px;
		min-height: 70px;
		border-radius: 1000px;
		background-color: #141416;
		font-family: 'Roboto', sans-serif;
		border: 2px solid #2f2f31;
		color: #2f2f31;
		font-size: 80%;
		z-index: 19;
		font-weight: bolder;
		position: relative;
	}

	.navbarButton::before {
		content: '';
		display: block;
		width: 0px;
		height: 0px;
		background-color: white;
		border-radius: 50%;
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		transition: width 0.3s, height 0.3s;
	}

	.navbarDiv {
		position: fixed;
		top: 90%;
		left: 50%;
		display: flex;
		justify-content: space-between;
		width: 30%;
		align-items: center;
		overflow: visible;
		transform: translate(-50%, -50%);
		height: 90px;
	}

	.navbarButton:hover {
		color: #141416;
		transform: scale(1.1); /* Agrandit le bouton au survol */
	}

	.navbarButton:hover::before {
		width: 90px;
		height: 90px;
		z-index: -1;
	}

	.circleMouse {
		position: absolute;
		width: 100px;
		height: 100px;
		border-radius: 50%;
		transition: 0.05s ease;
		z-index: 20;
		background-color: white;
		mix-blend-mode: difference;
		pointer-events: none;
	}

	.insideCircle {
		position: absolute;
		width: 20px;
		z-index: 20;
		height: 20px;
		border-radius: 50%;
		background-color: white;
		mix-blend-mode: difference;
		opacity: 70%;
		pointer-events: none;
	}

	.section {
		display: flex;
		width: 100vw;
		height: 100vh;
		justify-content: center;
		flex-direction: column;
		align-items: center;
	}

	#sec1 {
		background-color: #141416;
	}

	#sec2 {
		background-color: #141416;
	}

	#sec3 {
		background-color: #141416;
	}

	#mainTittle {
		animation: tracking-in-expand 1s ease forwards, letter-shadow 2s ease forwards;
	}

	#projectTittle {
		font-size: 150px;
	}

	.spacerNavbar {
		width: 100%;
		height: 2px;
		background-color: #2f2f31;
	}

	.navbarA:hover {
		color: white;
		transition: 1s ease;
	}

	#AboutMeSection {
		width: 80%;
		height: 60%;
		justify-content: left;
		display: flex;
		flex-direction: column;
	}

	#ContactSection {
		align-items: center;
		width: 80%;
		height: 60%;
		justify-content: center;
		display: flex;
		flex-direction: column;
	}

	#rrrrrrrr {
		overflow: visible;
	}

	#aboutMeTittle {
		margin-bottom: 0px;
		font-size: 150px;
		text-align: right;
	}

	#contactMeTittle {
		margin-bottom: 0px;
		font-size: 180px;
		text-align: center;
		transition: 0.5s ease;
	}

	#contactMeTittle:hover {
		letter-spacing: 15px;
	}

	#contactMeTittle:hover #circleMouse {
		background-color: red;
	}

	.animate-test {
		animation: tracking-in-expand 0.6s ease, letter-shadow 1s ease forwards;
	}

	#aboutMeP {
		font-size: 2em;
		color: white;
		font-family: 'Roboto', sans-serif;
		padding-left: 10%;
		padding-top: 5%;
		letter-spacing: 1px;
		height: 90%;
		overflow: hidden;
	}

	#aboutUnderSection {
		width: 80%;
		text-align: right;
		overflow: hidden;
		font-weight: bolder;
		margin-left: auto;
		height: 100%;
		right: 0;
	}

	#ContactUnderSection {
		width: 70%;
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		height: 100%;
		right: 0;
	}

	#mailForm {
		width: 80%;
		height: 90%;
		gap: 10%;
		justify-content: center;
		align-items: center;
		display: flex;
		flex-direction: column;
	}

	.mailInput {
		width: 50%;
		padding: 12px;
		appearance: auto;
		background-color: #2f2f31;
		transition: 0.5s ease;
		color: white;
	}

	.mailInput:hover {
		width: 55%;
	}

	.mailInput:focus {
		background-color: white;
		width: 55%;
		font-weight: bolder;
		box-shadow: 8px 8px #2f2f31;
		border: 0px solid;
		color: #2f2f31;
	}

	#mailarea {
		width: 50%;
		height: 50%;
		padding: 12px;
		appearance: auto;
		border: 0px solid;
		resize: none;
		overflow: auto;
		background-color: #2f2f31;
		transition: 0.5s ease;
		font-family: 'Roboto', sans-serif;
		color: white;
	}

	#mailarea:hover {
		width: 55%;
	}

	#mailarea:focus {
		background-color: white;
		width: 55%;
		font-weight: bold;
		box-shadow: 8px 8px #2f2f31;
		border: 0px solid;
		border: 0px solid;
		color: #2f2f31;
	}

	#mailbutton {
		width: 90px;
		height: 40px;
		border-radius: 0%;
		background-color: #2f2f31;
		border: 0px solid;
		color: white;
		padding: 10px;
		transition: 0.5s ease;
	}

	#mailbutton:hover {
		background-color: white;
		color: #2f2f31;
		font-weight: bolder;
	}

	#divWrapper {
		display: contents;
	}

	.MainTittleSection {
		overflow: visible;
	}

	@media screen and (max-width: 900px) {
		.navbarDiv {
			position: fixed;
			top: 90%;
			left: 50%;
			display: flex;
			justify-content: space-between;
			width: 90%;
			align-items: center;
			overflow: visible;
			transform: translate(-50%, -50%);
			height: 75px;
		}

		.navbarButton {
			min-width: 60px;
			min-height: 60px;
			border-radius: 1000px;
			background-color: #141416;
			font-family: 'Roboto', sans-serif;
			border: 2px solid #2f2f31;
			color: #2f2f31;
			font-size: 80%;
			z-index: 19;
			font-weight: bolder;
			position: relative;
		}

		#mainTittle {
			font-size: 5em;
		}

		#projectTittle {
			font-size: 5.5em;
		}
	}

	@media screen and (min-height: 887px) {
		#UnderSection1sec2 {
			width: 70%;
			flex-direction: column;
			color: white;
			height: 70%;
			overflow: visible;
		}
		.TitleSection {
			font-size: 200px;
			font-weight: bolder;
			color: white;
			margin: 0;
			user-select: none;
			margin-bottom: 100px;
		}
		#cardSection {
			display: flex;
			gap: 60px;
			width: 80%;
			padding: 40px;
			flex-wrap: nowrap;
			overflow-y: hidden;
			overflow-x: visible;
		}
	}

	@media screen and (max-height: 887px) {
		#UnderSection1sec2 {
			width: 70%;
			color: white;
			height: 80%;
			scrollbar-width: none; /* Pour Firefox */
			-ms-overflow-style: none; /* Pour Internet Explorer et Edge */
			overflow: visible;
		}
		.TitleSection {
			font-size: 200px;
			color: white;
			margin: 0;
			user-select: none;
			margin-bottom: 20px;
		}
		#cardSection {
			display: flex;
			gap: 60px;
			width: 80%;
			padding: 40px;
			flex-wrap: nowrap;
			overflow: auto;
			scrollbar-width: none; /* Pour Firefox */
			-ms-overflow-style: none; /* Pour Internet Explorer et Edge */
		}

		#cardSection::-webkit-scrollbar {
			scrollbar-width: 0;
			display: none;
		}
	}

	@media screen and (max-height: 700px) {
		#UnderSection1sec2 {
			width: 70%;
			flex-direction: row;
			display: flex;
			color: white;
			height: 60%;
			overflow: visible;
		}
		.TitleSection {
			font-size: 200px;
			color: white;
			margin: 0;
			user-select: none;
			margin-bottom: 20px;
		}
		#cardSection {
			display: flex;
			gap: 60px;
			width: 50%;
			flex-direction: column;
			padding: 40px;
			flex-wrap: nowrap;
			overflow: visible;
		}
	}

	@keyframes tracking-in-expand {
		0% {
			letter-spacing: -0.5em;
			opacity: 0;
		}
		40% {
			opacity: 0.6;
		}
		100% {
			opacity: 1;
		}
	}

	@keyframes letter-shadow {
		0% {
			text-shadow: 0px 0px #2f2f31;
		}
		40% {
			text-shadow: 5px 5px #2f2f31;
		}
		100% {
			text-shadow: 15px 15px #2f2f31;
		}
	}

	@keyframes project-appear {
		0% {
			color: red;
		}
		100% {
			color: blue;
		}
	}
</style>
