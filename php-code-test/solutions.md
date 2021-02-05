First, I encountered a problem executing the giving sql file. 
It turns out the datetime format has a minimum value of 1000-01-01, so I changed all the dates to be able to import the table.

The first task was rather simple. I just queried based on the comments containing a keyword. I went back to make the data look a bit better.

For the second task, I was stuck for some time on datetime conversion since SQL assumed that the year came first rather than month. My string indexing also is super messy. I know there has to be a better way, but I think I've spent enough time on this already.

Cleaned up the code a bit and added some comments.

