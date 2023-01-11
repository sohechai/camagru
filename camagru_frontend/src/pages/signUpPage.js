import React from 'react'
import '../styles/signUpPage.scss'
import logo from '../images/logo.png'

function signUpPage() {
  return (
	<section className='signUpContainer'>
		<div className='header'>
			<img src={logo} alt="logo" />
			<p>Sign up to see photos and videos from your friends.</p>
		</div>
		<div className='signUpForm'>
			<input type="text" id="email" name="email" placeholder="email" />
			<input type="text" id="username" name="username" placeholder="username" />
			<input type="text" id="password" name="password" placeholder="password" />
			<button className='su'>Sign up</button>
			<div className='signInContainer'>
				<p>
					Have an account?&nbsp;
					<span className='si'>Log in</span>	
				</p>
			</div>
		</div>
	</section>
  )
}

export default signUpPage