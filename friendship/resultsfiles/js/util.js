function makePermalink(str) {
    return str.replace(/[^a-z0-9]+/gi, '-').replace(/^-*|-*$/g, '').toLowerCase();
}
function abbreviateTitle(str, max, suffix) {
  if((str = str.replace(/^\s+|\s+$/g, '').replace(/[\r\n]*\s*[\r\n]+/g, ' ').replace(/[ \t]+/g, ' ')).length <= max)
  {
    return str;
  }
  
  var 
  abbr = '',
  str = str.split(' '),
  suffix = (typeof suffix !== 'undefined' ? suffix : ' ...'),
  max = (max - suffix.length);
  
  for(var len = str.length, i = 0; i < len; i ++)
  {
    if((abbr + str[i]).length < max)
    {
      abbr += str[i] + ' ';
    }
    else { break; }
  }
  return abbr.replace(/[ ]$/g, '') + suffix;
}
function createAcronym(string) {
	var words, acronym, nextWord;
	words = string.split(/\s/);
	acronym = "";
	index = 0;
	while (index < words.length) {
		nextWord = words[index];
		if (nextWord.charAt(0) !== '(' && nextWord.charAt(0) !== '[' && nextWord.charAt(0) !== '{')
			acronym = acronym + nextWord.charAt(0);
		index = index + 1;
	}
	return acronym;
}
function isAnAcronym(abbr, string) {
	if (abbr === createAcronym(string)) {
		return true;
	}
	return false;
}
function levenshteinDistance (a, b) {
    if(a.length == 0) return b.length; 
	if(b.length == 0) return a.length; 
	var matrix = [];
	// increment along the first column of each row
	var i;
	for(i = 0; i <= b.length; i++){
		matrix[i] = [i];
	}
	// increment each column in the first row
	var j;
	for(j = 0; j <= a.length; j++){
		matrix[0][j] = j;
	}
	// Fill in the rest of the matrix
	for(i = 1; i <= b.length; i++){
		for(j = 1; j <= a.length; j++){
			if(b.charAt(i-1) == a.charAt(j-1)){
			matrix[i][j] = matrix[i-1][j-1];
			} else {
			matrix[i][j] = Math.min(matrix[i-1][j-1] + 1, // substitution
			                        Math.min(matrix[i][j-1] + 1, // insertion
			                                 matrix[i-1][j] + 1)); // deletion
			}
		}
	}
	return matrix[b.length][a.length];
}
function wordInString(s, word){
  return new RegExp( '\\b' + word + '\\b', 'i').test(s);
}
function isNegligible(string) {
	var negligibleArray = ['the', 'el', 'i', 'iii', 'la', 'le', 'a', 'our'];
	negligibleArray.forEach(function(item, index, array) {
		if (string.toLowerCase() === item) {
			return true;
		}
	});
	return false;
}
function removeNegligible(string) {
	var index = 0;
	var words = string.split(/\s/);
	var returnString = '';
	while (index < words.length) {
		if (!isNegligible(words[index]))
			returnString = returnString + words[index];
		index = index + 1;
	}
	return returnString;
}
function isSimilar(string1, string2) {
	if (string1.length < 5) {
		if (string2.length >= 5) {
			if (!wordInString(string2, string1) && levenshteinDistance(string1, string2) > 2 && !isAnAcronym(string1, string2)) {
				return false;
			}
		}
		else {
			if (levenshteinDistance(string1, string2) > 2) {
				return false;
			}
		}
	}
	else if (string2.length < 5) {
		if (string1.length >= 5) {
			if (!wordInString(string1, string2) && levenshteinDistance(string2, string1) > 2 && !isAnAcronym(string2, string1)) {
				return false;
			}
		}
		else {
			if (levenshteinDistance(string2, string1) > 2) {
				return false;
			}
		}
	}
	else if (levenshteinDistance(string1, string2) > 4) {
		if (string1.indexOf('University') === -1
			&& string1.indexOf('College') === -1
			&& string2.indexOf('University') === -1
			&& string2.indexOf('College') === -1) {
			return false;
		}
		else {
			if (string1.indexOf('University') !== -1) {
				if (levenshteinDistance(string1.replace('University', ''), string2) > 4) {
					return false;
				}
			}
			if (string1.indexOf('College') !== -1) {
				if (levenshteinDistance(string1.replace('College', ''), string2) > 4) {
					return false;
				}
			}
			if (string2.indexOf('University') !== -1) {
				if (levenshteinDistance(string2.replace('University', ''), string1) > 4) {
					return false;
				}
			}
			if (string2.indexOf('College') !== -1) {
				if (levenshteinDistance(string2.replace('College', ''), string1) > 4) {
					return false;
				}
			}
		}
	}
	return true;
}

function isSimilarName(string1, string2) {
	if (string1 === string2) {
		return true;
	}
	if (string1.indexOf(string2) !== -1 && string2.indexOf(string1) !== -1) {
		return false;
	}
	if (levenshteinDistance(string1, string2) > 2) {
		return false;
	}
	return true;
}

function hasWordsOfEachOther(string1, string2) {
	
	if (wordInString(string1, string2) || wordInString(string2, string1)) {
		return true;
	} else {
		if (/\s/.test(string1)) {
	    	// It has any kind of whitespace
			var string1Words = string1.split(' ');
			string1Words.forEach(function(item, index, array) {
				if (wordInString(string2, item) && !isNegligible(item)) {
					//ok this item is in the word
					return true;
				}
			});
		}
		if (/\s/.test(string2)) {
			var string2Words = string2.split(' ');
			string2Words.forEach(function(item, index, array) {
				if (wordInString(string1, item) && !isNegligible(item)) {
					//ok this item is in the word
					return true;
				}
			});
		}
		return false;
	}
	return false;
}

function arrayObjectIndexOf(myArray, searchTerm, property) {
    for(var i = 0, len = myArray.length; i < len; i++) {
        if (myArray[i][property] === searchTerm) return i;
    }
    return -1;
}

function arrayMultiObjectIndexOf(array, searchTerms, properties) {
	//SEARCH TERMS ARRAY AND PROPERTIES ARRAY NEED TO BE SAME LENGTH AND SAME ORDER
	var compareLength = searchTerms.length;
	if (searchTerms.length === properties.length) {	
		for(var i = 0, len = array.length; i < len; i++) {
			for(var j = 0, jlen = searchTerms.length; j < jlen; j++) {
				if (array[i][properties[j]] === searchTerms[j]) {
					if (j === jlen-1) {
						return i;
					}
				}
				else break;
			}
	    }
    }
    return -1;
}