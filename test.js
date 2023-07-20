import React from 'react'
import axios from 'axios';

export default function test() {
    

const encodedParams = new URLSearchParams();
encodedParams.set('currency', 'USD');
encodedParams.set('limit', '15');
encodedParams.set('language', 'en_US');
encodedParams.set('location_id', '15333482');

const options = {
  method: 'POST',
  url: 'https://worldwide-restaurants.p.rapidapi.com/reviews',
  headers: {
    'content-type': 'application/x-www-form-urlencoded',
    'X-RapidAPI-Key': '1bb1ef268fmshb7f3da6426b134fp1b085cjsn4b3c4ff4b564',
    'X-RapidAPI-Host': 'worldwide-restaurants.p.rapidapi.com'
  },
  data: encodedParams,
};

try {
	const response = axios.request(options);
	console.log(response.data);
} catch (error) {
	console.error(error);
}
  return (
    
    <div>test</div>
  )
}
