import React from 'react'
import '../styles/gallery.scss'
import FavoriteBorderIcon from '@mui/icons-material/FavoriteBorder';
import FavoriteIcon from '@mui/icons-material/Favorite';
import ModeCommentIcon from '@mui/icons-material/ModeComment';
import avatar from '../images/avatar.png'

function galleryGrid({image, likesNb, didLike, commentsNb, name}) {
  return (
	<div className='gallerySquare'>
		<img src={image} alt={image} />
		<p>
			{
			didLike === "Y" ?
			<FavoriteIcon />
			:
			<FavoriteBorderIcon />
			}
			{likesNb} like(s)
			<ModeCommentIcon />
			{commentsNb} comment(s)
		</p>
		<div className='commentSection'>
			{/* <p></p> */}
			<p><span>{name}</span> heyyy trop cool !!! :D heyyy trop cool !!! :D :D heyyy trop cool !!! :D :D heyyy trop cool !!! :D :D heyyy trop cool !!! :D :D heyyy trop cool !!! :D :D heyyy trop cool !!! :D</p>
			<p><span>{name}</span> heyyy trop cool !!! :D heyyy trop cool !!! :D :D heyyy trop cool !!! :D :D heyyy trop cool !!! :D :D heyyy trop cool !!! :D :D heyyy trop cool !!! :D :D heyyy trop cool !!! :D</p>
			<p><span>{name}</span> heyyy trop cool !!! :D heyyy trop cool !!! :D :D heyyy trop cool !!! :D :D heyyy trop cool !!! :D :D heyyy trop cool !!! :D :D heyyy trop cool !!! :D :D heyyy trop cool !!! :D</p>
			<p><span>{name}</span> heyyy trop cool !!! :D heyyy trop cool !!! :D :D heyyy trop cool !!! :D :D heyyy trop cool !!! :D :D heyyy trop cool !!! :D :D heyyy trop cool !!! :D :D heyyy trop cool !!! :D</p>

		</div>
	</div>
  )
}

export default galleryGrid