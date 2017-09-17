#include "KnapSack.h"

KnapSackObject::KnapSackObject()
{
	int max = 4;
	knapSackContents = new Item[max];
	/*int max = 5;
	knapSackContents = new Item*[max];
	for (int i = 0; i < max; i++)
	{
		knapSackContents[i] = new Item[max];
	}*/

	//Initialize the array;
	InitializeArray();
}

KnapSackObject::~KnapSackObject()
{
	//Clear the arrays out
	/*for (int i = 0; i < 5; i++)
	{
		delete[] knapSackContents[i];
	}*/

	delete[] knapSackContents;
}

void KnapSackObject::InitializeArray()
{
	int j = 0;
	for (int i = 2; i < 6; i++,j++)
	{
		knapSackContents[j].benefits = (knapSackContents[j].weight = i) + 1;
	}
}
