#pragma once
#ifndef KnapSack
#define KnapSack

struct Item
{
	int weight;
	int benefits;
};

class KnapSackObject
{
public:
	Item * knapSackContents;
	KnapSackObject();
	~KnapSackObject();

private:
	void InitializeArray();
};
#endif // !KnapSack
