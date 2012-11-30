#!/usr/bin/python
#search.py

############### Input setup ##############
#dptcity arvcity yy-mm-dd hours:mins depart within
#0       1       2        3          4      5
#e.g. Suburbs Carbondale 12-08-13 12:20 1 6
#e.g. Suburbs Carbondale 12-08-13 -1 -1 -1
#depart = 1 if searching for departure time

############### Output setup ###############
#num of results
#dptcity arvcity yy-mm-dd dpthours:mins arvhours:mins company price specificdpt specificarv


import sys

########## Finds the difference between two times in minutes ###########
########## First time is target, second is what to compare to ##########
########## Returns negative if compare time is before, positive if after ###########
def findDifference(target_time, compare_time):
	target_mins = 60*int(target_time[:2]) + int(target_time[3:])	#target_mins is the minutes in target
	compare_mins = 60*int(compare_time[:2]) + int(compare_time[3:])	#compare_mins is minutes in compare
	difference = compare_mins - target_mins				#find the difference between them
	return difference						#return difference
	

######## Searches for the query in trips.dat ########
def searchfor(query, time, depart, within):
	results = []					#initialize results array
	for line in open("trips.dat"):			#for each line in trips.dat
		if query in line:			#if the query is in the line
			trip = line[:len(line)-1].split()#set trip equal to found line and split into elements
			if time == '-1':
				results.append(trip)
			else:
				if depart == 1:					#if looking for departure time
					difference = findDifference(time, trip[3])	#set difference
				if depart == 0:					#if looking for arrival time
					difference = findDifference(time, trip[4])	#set difference
				if (difference < (within*60)) and (difference > (within*-60)):	#if within time constraints
					results.append(trip)					#append to results
	return results									#return results
			

############# Main Program ###############
def main():
	########## Setting variables from the input ##########
	query = " ".join(sys.argv[1:])	        #join all arguments into the variable 'query'
	query = query.split()			#split query into seperate words
	within = int(query.pop())		#pops off last int, num of hours within which to search
	depart = int(query.pop())		#pops off last int, 1 if departure time, 0 if arrival
	time = query.pop()			#pops off time, set in 24hr hh:mm format
	query = " ".join(query)			#rejoin query
	
	########### Running functions ##########

	results = searchfor(query, time, depart, within)#search for query in trips.dat

	print len(results)

	resultstring = ''
	tripstring = ''

	for trip in results:
		for item in trip:
			tripstring = tripstring + item + ' '
		resultstring = resultstring+tripstring+'\n'
		tripstring = ''
	
	print resultstring

main()
