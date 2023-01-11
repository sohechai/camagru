import React from 'react'
import '../styles/loginPage.scss'
import logo from '../images/logo.png'

function loginPage() {
  return (
	<section className='loginContainer'>
		<div className='header'>
			<img src={logo} alt="logo" />
		</div>
		<div className='signInForm'>
			<input type="text" id="username" name="username" placeholder="username" />
			<input type="text" id="password" name="password" placeholder="password" />
			<button className='log'>Log in</button>
			<div className='signUpContainer'>
				<p>
					Don't have an account?&nbsp;
					<span className='su'>Sign up</span>	
				</p>
				<span className='su'>Forgot password?</span>
			</div>
		</div>
	</section>
  )
}

export default loginPage