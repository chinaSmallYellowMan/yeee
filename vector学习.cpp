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
	// 1��---------------------------------------------------------
	vector<int>v1;//Ĭ�Ϲ��죬�޲ι���

	for (int i = 0; i < 10; i++) {
		v1.push_back(i);
	}
	printVector(v1);

	vector<int>v2(v1.begin(), v1.end());//ͨ�����䷽ʽ���й���
	printVector(v2);

	vector<int>v3(10, 100);//10��100����
	printVector(v3);

	vector<int>v4(v3);//��������
	printVector(v4);

	// 2�������ʹ�С----------------------------------------------
	if (v1.empty())//�ж�vector�Ƿ�Ϊ��
		cout << "v1Ϊ��" << endl;
	else cout << "v1��Ϊ��" << endl;

	cout << "v1��������"<<v1.capacity()<<"    v1�Ĵ�С��"
		<<v1.size() << endl;

	v1.resize(16);//����ָ����С,��ԭ����Ĭ�ϲ�0�������ɾ����
	cout << "v1��������" << v1.capacity() << "    v1�Ĵ�С��"
		<< v1.size() << endl;
	printVector(v1);


	// 3�������ɾ��----------------------------------------------
	
	vector<int>v5;
	v5.push_back(10);//���
	v5.push_back(15);//���
	printVector(v5);

	v5.pop_back();
	printVector(v5);//βɾ

	v5.insert(v5.begin(),100);//���룬��һ�������ǵ�����
	printVector(v5);

	v5.insert(v5.begin(), 2,200);//����2��200����һ�������ǵ�����
	printVector(v5);

	v5.erase(v5.begin());//ɾ��
	printVector(v5);

	//v5.erase(v5.begin(),v5.end());  //��� 1
	//v5.clear();  //��� 2

	// 4�����ݴ�ȡ----------------------------------------------

	vector<int>v6;
	v6.push_back(6);//���
	v6.push_back(7);//���
	cout << "4.���ݴ�ȡ--ʹ��v6[0]��" << v6[0] << endl;
	cout << "4.���ݴ�ȡ--ʹ��v6.at(1)��" << v6.at(1) << endl;


	// 5��vector��������----------------------------------------------

	cout << "" << endl;
	cout << "5��vector��������----------------------------------------------" << endl; 
	vector<int>v7;
	v7.push_back(6);//���
	v7.push_back(8);//���
	vector<int>v8;
	v8.push_back(9);//���
	v8.push_back(11);//���

	cout << "5.vector��������ǰ v7��" << endl;
	printVector(v7);
	cout << "5.vector��������ǰ v8��" << endl;
	printVector(v8);

	v7.swap(v8);//��������

	cout << "vector���������� v7��" << endl;
	printVector(v7);
	cout << "vector���������� v8��" << endl;
	printVector(v8);
	
	cout << "" << endl;

	//�������������ȴ�С����ʱ������swap������������
	// vector<int>(v).swap(v);  -->������������,��v��������v���������С����ͬ


	// 6��reserveԤ���ռ�----------------------------------------------
	vector<int>v9;
	int num = 0;
	int* p = NULL;
	for (int i = 0; i < 100000; i++) {
		v9.push_back(i);
		if (p != &v9[0]) { //������������µ�ַ����p���������׵�ַ
			p = &v9[0]; // ��pָ���׵�ַ
			num++;
		}
	
	}
	//ʹ�� v9.reserve(100000);  ��ֻ������һ��
	cout<<"v9����100000����ַ��Ҫ��������������" << num << endl;

}


void main() {
	test01();
}