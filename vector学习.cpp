#include<iostream>
using namespace std;
#include<vector>

void printVector(vector<int>& v) {
	
	for (vector<int>::iterator it = v.begin(); it != v.end(); it++) {
		cout << *it << " " ;
	}
	cout << endl;
}


void test01() {
	// 1、---------------------------------------------------------
	vector<int>v1;//默认构造，无参构造

	for (int i = 0; i < 10; i++) {
		v1.push_back(i);
	}
	printVector(v1);

	vector<int>v2(v1.begin(), v1.end());//通过区间方式进行构造
	printVector(v2);

	vector<int>v3(10, 100);//10个100构造
	printVector(v3);

	vector<int>v4(v3);//拷贝构造
	printVector(v4);

	// 2、容量和大小----------------------------------------------
	if (v1.empty())//判断vector是否为空
		cout << "v1为空" << endl;
	else cout << "v1不为空" << endl;

	cout << "v1的容量："<<v1.capacity()<<"    v1的大小："
		<<v1.size() << endl;

	v1.resize(16);//重新指定大小,比原来长默认补0，短则会删后面
	cout << "v1的容量：" << v1.capacity() << "    v1的大小："
		<< v1.size() << endl;
	printVector(v1);


	// 3、插入和删除----------------------------------------------
	
	vector<int>v5;
	v5.push_back(10);//后插
	v5.push_back(15);//后插
	printVector(v5);

	v5.pop_back();
	printVector(v5);//尾删

	v5.insert(v5.begin(),100);//插入，第一个参数是迭代器
	printVector(v5);

	v5.insert(v5.begin(), 2,200);//插入2个200，第一个参数是迭代器
	printVector(v5);

	v5.erase(v5.begin());//删除
	printVector(v5);

	//v5.erase(v5.begin(),v5.end());  //清空 1
	//v5.clear();  //清空 2

	// 4、数据存取----------------------------------------------

	vector<int>v6;
	v6.push_back(6);//后插
	v6.push_back(7);//后插
	cout << "4.数据存取--使用v6[0]：" << v6[0] << endl;
	cout << "4.数据存取--使用v6.at(1)：" << v6.at(1) << endl;


	// 5、vector容器互换----------------------------------------------

	cout << "" << endl;
	cout << "5、vector容器互换----------------------------------------------" << endl; 
	vector<int>v7;
	v7.push_back(6);//后插
	v7.push_back(8);//后插
	vector<int>v8;
	v8.push_back(9);//后插
	v8.push_back(11);//后插

	cout << "5.vector容器互换前 v7：" << endl;
	printVector(v7);
	cout << "5.vector容器互换前 v8：" << endl;
	printVector(v8);

	v7.swap(v8);//容器互换

	cout << "vector容器互换后 v7：" << endl;
	printVector(v7);
	cout << "vector容器互换后 v8：" << endl;
	printVector(v8);
	
	cout << "" << endl;

	//当容器的容量比大小更大时，巧用swap可以收缩容器
	// vector<int>(v).swap(v);  -->创建匿名对象,与v交换，则v的容量与大小会相同


	// 6、reserve预留空间----------------------------------------------
	vector<int>v9;
	int num = 0;
	int* p = NULL;
	for (int i = 0; i < 100000; i++) {
		v9.push_back(i);
		if (p != &v9[0]) { //如果容量开辟新地址，即p不是容器首地址
			p = &v9[0]; // 让p指向首地址
			num++;
		}
	
	}
	//使用 v9.reserve(100000);  则只会扩充一次
	cout<<"v9开辟100000个地址需要扩充容量次数：" << num << endl;

}


void main() {
	test01();
}