import React from 'react';
import { useForm } from 'react-hook-form';
import { Upload } from 'lucide-react';

export default function MemberRegistration() {
  const { register, handleSubmit, formState: { errors } } = useForm();

  const onSubmit = (data: any) => {
    console.log(data);
    // This would connect to your Django backend
  };

  return (
    <div className="max-w-2xl mx-auto">
      <h1 className="text-3xl font-bold text-gray-800 mb-8">Member Registration</h1>
      
      <form onSubmit={handleSubmit(onSubmit)} className="bg-white shadow-md rounded-lg p-6 space-y-6">
        <div className="grid grid-cols-2 gap-4">
          <div>
            <label className="block text-sm font-medium text-gray-700">First Name</label>
            <input
              type="text"
              {...register('firstName', { required: true })}
              className="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            />
            {errors.firstName && <span className="text-red-500 text-sm">This field is required</span>}
          </div>
          
          <div>
            <label className="block text-sm font-medium text-gray-700">Last Name</label>
            <input
              type="text"
              {...register('lastName', { required: true })}
              className="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            />
          </div>
        </div>

        <div>
          <label className="block text-sm font-medium text-gray-700">Email</label>
          <input
            type="email"
            {...register('email', { required: true, pattern: /^\S+@\S+$/i })}
            className="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
          />
        </div>

        <div>
          <label className="block text-sm font-medium text-gray-700">Role</label>
          <select
            {...register('role', { required: true })}
            className="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
          >
            <option value="">Select a role...</option>
            <option value="coach">Coach</option>
            <option value="judge">Judge</option>
            <option value="gymnast">Gymnast</option>
            <option value="committee">Committee Member</option>
          </select>
        </div>

        <div>
          <label className="block text-sm font-medium text-gray-700">Club</label>
          <select
            {...register('club')}
            className="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
          >
            <option value="">Select a club...</option>
            <option value="club1">Yaoundé Gymnastics Club</option>
            <option value="club2">Douala Sports Academy</option>
          </select>
        </div>

        <div>
          <label className="block text-sm font-medium text-gray-700">Discipline</label>
          <select
            {...register('discipline')}
            className="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
          >
            <option value="">Select a discipline...</option>
            <option value="artistic">Artistic Gymnastics</option>
            <option value="rhythmic">Rhythmic Gymnastics</option>
            <option value="trampoline">Trampoline</option>
          </select>
        </div>

        <div>
          <label className="block text-sm font-medium text-gray-700">Photo</label>
          <div className="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
            <div className="space-y-1 text-center">
              <Upload className="mx-auto h-12 w-12 text-gray-400" />
              <div className="flex text-sm text-gray-600">
                <label className="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                  <span>Upload a file</span>
                  <input type="file" className="sr-only" {...register('photo')} />
                </label>
              </div>
              <p className="text-xs text-gray-500">PNG, JPG up to 10MB</p>
            </div>
          </div>
        </div>

        <div className="flex justify-end">
          <button
            type="submit"
            className="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
          >
            Register Member
          </button>
        </div>
      </form>
    </div>
  );
}