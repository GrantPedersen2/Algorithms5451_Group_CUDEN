#include<iostream>
#include<string>
#include"KnapSack.h"

void Display(int knap[][5])
{
	for (int i = 0; i < 4; i++) //items 
	{
		for (int w = 0; w < 5; w++) //weight
		{
			std::cout << "|" << knap[i][w] << "|";
		}
		std::cout << "\n";
	}
}

void ExamineKnapSack(const KnapSackObject *knapSack)
{
	//Initialize knapsack stuff
	int knap[4][5];

	for (int i = 0; i < 4; i++)
	{
		for (int w = 0; w < 5; w++)
		{
			knap[i][w] = 0;
		}
	}

	for (int i = 1; i < 4; i++) //items 
	{
		int Wi = knapSack->knapSackContents[i - 1].weight;
		int benefit = knapSack->knapSackContents[i - 1].benefits;

		for (int w = 1; w < 5; w++) //weight
		{
			if (Wi <= w)
			{
				if (benefit + knap[i - 1][w - Wi] > knap[i - 1][w])
				{
					knap[i][w] = benefit + knap[i - 1][w - Wi];
				}
				else
				{
					knap[i][w] = knap[i - 1][w];
				}
			}
			else
			{
				knap[i][w] = knap[i - 1][w]; //wi > w
			}
		}
	}

	Display(knap);
}

int main(int argc, char * argv[])
{
	KnapSackObject* knapSack = new KnapSackObject();
	ExamineKnapSack(knapSack);
	delete knapSack;

	char c = 'c';
	std::cin.get(c);
	return 0;
}