/** Shopify CDN: Minification failed

Line 7:66 Transforming let to the configured target environment ("es5") is not supported yet
Line 7:270 Transforming let to the configured target environment ("es5") is not supported yet

**/
function generateStarRating(t){if(t<0||t>5)return"Invalid rating";let e=Math.floor(t),n=t%1!=0,r="&#xE000;&nbsp;".repeat(e);return n&&(r+="&#xE002;&nbsp;"),r+="&#xE001;&nbsp;".repeat(5-e-(n?1:0))}function getRating(t,e){if(!t||!e)return{totalReviews:0,averageRating:0};{let n=parseFloat(e).toFixed(1);return{totalReviews:t,averageRating:n}}}