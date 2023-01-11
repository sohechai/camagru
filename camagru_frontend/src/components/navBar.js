import React from 'react'
import logo from '../images/horizontal_logo.png'
import LogoutIcon from '@mui/icons-material/Logout';
import AccountCircleIcon from '@mui/icons-material/AccountCircle';
import LibraryAddIcon from '@mui/icons-material/LibraryAdd';
import SearchIcon from '@mui/icons-material/Search';

function navBar() {
  return (
	<section className='navBarContainer'>
		<div className='headerLeft'>
			<img src={logo} alt="logo" />
		</div>
		<div className='searchBar'>
			{/* <span classname='sb'> */}
				<input type="text" id="search" name="search" placeholder="search" />
				<SearchIcon />
			{/* </span> */}
		</div>
		<div className='headerRight'>
			<LogoutIcon />
			<AccountCircleIcon />
			<LibraryAddIcon />
		</div>
	</section>
  )
}

export default navBar