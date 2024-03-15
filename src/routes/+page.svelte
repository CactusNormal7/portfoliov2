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

	//mouse speed
	let lastMouseX = 0;
	let lastMouseY = 0;
	let speedX = 0;
	let speedY = 0;
	let marge;
	let cas = 0;

	let scrollLevel = 0;
	//____________________________________
	let elementToAnimate;
	let elementToAnimate2;
	let elementToAnimate3;
	let isinter = false;
	let isinter2 = false;
	let isinter3 = false;

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
			cursor.style.width = `${cursorDiameter}px`;
			cursor.style.height = `${cursorDiameter}px`;
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

	function test() {
		for (let i = 0; i < cardsRef.length; i++) {
			console.log(cardsRef[i].children[0]);
		}
	}

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
<body bind:this={body} on:click={test} role="application" on:mousemove={handleMouseMove}>
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

	<div class="section" id="sec2" bind:this={sections[1]}>
		<div id="UnderSection1sec2">
			<div class="MainTittleSection">
				<div bind:this={elementToAnimate} />
				{#if isinter}
					<h1 id="projectTittle" class="animate-test TitleSection">Project</h1>
				{:else}
					<h1 id="projectTittle" class="TitleSection">Project</h1>
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

	<div class="section" id="sec3" bind:this={sections[2]}>
		<div id="AboutMeSection">
			<div bind:this={elementToAnimate2} id="rrrrrrrr">
				{#if isinter2}
					<h1 class="TitleSection animate-test" id="aboutMeTittle">ABOUT ME</h1>
				{:else}
					<h1 class="TitleSection" id="aboutMeTittle">ABOUT ME</h1>
				{/if}
			</div>
			<div id="aboutUnderSection" />
		</div>
	</div>
	<div class="section" id="sec1" bind:this={sections[4]}>
		<div id="ContactSection">
			<div bind:this={elementToAnimate3} id="rrrrrrrr">
				{#if isinter3}
					<h1 class="TitleSection animate-test" id="contactMeTittle">CONTACT ME</h1>
				{:else}
					<h1 class="TitleSection" id="contactMeTittle">CONTACT ME</h1>
				{/if}
			</div>
			<div id="aboutUnderSection" />
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

	.animate-test {
		animation: tracking-in-expand 0.6s ease forwards, letter-shadow 1s ease forwards;
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
		justify-content: center;
		display: flex;
		flex-direction: column;
	}
	#ContactSection {
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
		font-size: 150px;
		text-align: center;
	}

	#aboutUnderSection {
		width: 100%;
		height: 100%;
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
