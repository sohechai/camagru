import React from 'react'
import '../styles/photoEdit.scss'
import LocalSeeIcon from '@mui/icons-material/LocalSee';

function photoEdit() {
  return (
	<section className='photoEditContainer'>
		<div className='cameraSide'>
			<div className='camera'>
				cam
			</div>
			<LocalSeeIcon />
			<div className='filterList'>
				filtre
			</div>
		</div>
		<div className='photosList'>
			
		</div>
	</section>
  )
}

export default photoEdit