import React from 'react';
import { Users, Medal, Award, ClipboardList } from 'lucide-react';
import { Link } from 'react-router-dom';

const DashboardCard = ({ icon: Icon, title, count, link }: { icon: any, title: string, count: number, link: string }) => (
  <Link to={link} className="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
    <div className="flex items-center justify-between">
      <div>
        <p className="text-gray-500 text-sm">{title}</p>
        <p className="text-2xl font-bold mt-1">{count}</p>
      </div>
      <Icon className="h-8 w-8 text-blue-500" />
    </div>
  </Link>
);

export default function AdminDashboard() {
  return (
    <div>
      <h1 className="text-3xl font-bold text-gray-800 mb-8">
        Admin Dashboard
      </h1>
      
      <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <DashboardCard 
          icon={Users} 
          title="Total Members" 
          count={156} 
          link="/admin/members" 
        />
        <DashboardCard 
          icon={Medal} 
          title="Active Clubs" 
          count={12} 
          link="/admin/clubs" 
        />
        <DashboardCard 
          icon={Award} 
          title="Judges" 
          count={24} 
          link="/admin/judges" 
        />
        <DashboardCard 
          icon={ClipboardList} 
          title="Pending Approvals" 
          count={5} 
          link="/admin/approvals" 
        />
      </div>

      <div className="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div className="bg-white p-6 rounded-lg shadow-md">
          <h2 className="text-xl font-semibold mb-4">Recent Activities</h2>
          <div className="space-y-4">
            <div className="flex items-center space-x-3 text-sm">
              <div className="w-2 h-2 bg-green-500 rounded-full"></div>
              <p>New member registration: <span className="font-medium">John Doe</span></p>
            </div>
            <div className="flex items-center space-x-3 text-sm">
              <div className="w-2 h-2 bg-blue-500 rounded-full"></div>
              <p>Club update: <span className="font-medium">Yaoundé Gymnastics Club</span></p>
            </div>
            <div className="flex items-center space-x-3 text-sm">
              <div className="w-2 h-2 bg-purple-500 rounded-full"></div>
              <p>New judge certification: <span className="font-medium">Sarah Smith</span></p>
            </div>
          </div>
        </div>

        <div className="bg-white p-6 rounded-lg shadow-md">
          <h2 className="text-xl font-semibold mb-4">Upcoming Events</h2>
          <div className="space-y-4">
            <div className="border-l-4 border-blue-500 pl-4">
              <p className="font-medium">National Championship</p>
              <p className="text-sm text-gray-500">March 15, 2024</p>
            </div>
            <div className="border-l-4 border-green-500 pl-4">
              <p className="font-medium">Judges Training Workshop</p>
              <p className="text-sm text-gray-500">March 20, 2024</p>
            </div>
            <div className="border-l-4 border-purple-500 pl-4">
              <p className="font-medium">Youth Competition</p>
              <p className="text-sm text-gray-500">April 5, 2024</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}