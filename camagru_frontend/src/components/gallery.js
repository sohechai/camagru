import React from 'react'
import '../styles/gallery.scss'
import image_01 from '../images/picture_01.png'
import image_02 from '../images/picture_02.png'
import image_04 from '../images/picture_04.png'
import GalleryGrid from './galleryGrid';

function gallery() {
  return (
	<section className='galleryContainer'>
		<div className='galleryGrid'>
			<GalleryGrid image={image_01} likesNb="1234" didLike="Y" commentsNb="13" name="sofiaaaaaa"/>
			<GalleryGrid image={image_02} likesNb="12345" didLike="Y" commentsNb="130" name="user1234"/>
			<GalleryGrid image={image_01} likesNb="12346" didLike="N" commentsNb="14" name="coucou"/>
			<GalleryGrid image={image_02} likesNb="12347" didLike="N" commentsNb="12" name="jesaispas"/>
			<GalleryGrid image={image_01} likesNb="12348" didLike="N" commentsNb="11" name="pardonnnn"/>
		</div>
	</section>
  )
}

export default gallery