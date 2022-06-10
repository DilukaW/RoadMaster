<?php


function check_login($con)
//returns userdata which returns diver detrails and other user specific details
{
	//checking whether the session has an Mem_id
	if(isset($_SESSION['D_Id']))
	{

		$id = $_SESSION['D_Id'];
		$query = "select * from Driver where Driver_Id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}
	else if(isset($_SESSION['RDA_Id']))
	{

		$id = $_SESSION['RDA_Id'];
		$query = "select * from rda where RDA_Id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			if($user_data)
			{
				$UID = $user_data['User_Id'];
				//read from database
				$query2 = "select * from user where U_ID = '$UID' limit 1";
				$result2 = mysqli_query($con, $query2);
				if($result2)
				{
					if($result2 && mysqli_num_rows($result2) > 0)
					{
						$user_data2 = mysqli_fetch_assoc($result2);
						return $user_data;
						//return $user_data2;
					}
				}

			}
			
			
		}
	}
	else if(isset($_SESSION['P_Id']))
	{

		$id = $_SESSION['P_Id'];
		$query = "select * from police where P_Id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			if($user_data)
			{
				$UID = $user_data['U_Id'];
				//read from database
				$query2 = "select * from user where U_ID = '$UID' limit 1";
				$result2 = mysqli_query($con, $query2);
				if($result2)
				{
					if($result2 && mysqli_num_rows($result2) > 0)
					{
						$user_data2 = mysqli_fetch_assoc($result2);
						return $user_data;
						//return $user_data2;
					}
				}

			}
			
			
		}
	}
	else if(isset($_SESSION['In_Id']))
	{

		$id = $_SESSION['In_Id'];
		$query = "select * from insurance where In_Id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			if($user_data)
			{
				$UID = $user_data['User_Id'];
				//read from database
				$query2 = "select * from user where U_ID = '$UID' limit 1";
				$result2 = mysqli_query($con, $query2);
				if($result2)
				{
					if($result2 && mysqli_num_rows($result2) > 0)
					{
						$user_data2 = mysqli_fetch_assoc($result2);
						return $user_data;
						//return $user_data2;
					}
				}

			}
			
			
		}
	}

}

function User_data($con)
//returns other users' ordinary details

{
	if(isset($_SESSION['RDA_Id']))
	{

		$id = $_SESSION['RDA_Id'];
		$query = "select * from rda where RDA_Id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			if($user_data)
			{
				$UID = $user_data['User_Id'];
				//read from database
				$query2 = "select * from user where U_ID = '$UID' limit 1";
				$result2 = mysqli_query($con, $query2);
				if($result2)
				{
					if($result2 && mysqli_num_rows($result2) > 0)
					{
						$user_data2 = mysqli_fetch_assoc($result2);
						//return $user_data;
						return $user_data2;
					}
				}

			}
			
			
		}
	}
	else if(isset($_SESSION['P_Id']))
	{

		$id = $_SESSION['P_Id'];
		$query = "select * from police where P_Id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			if($user_data)
			{
				$UID = $user_data['U_Id'];
				//read from database
				$query2 = "select * from user where U_ID = '$UID' limit 1";
				$result2 = mysqli_query($con, $query2);
				if($result2)
				{
					if($result2 && mysqli_num_rows($result2) > 0)
					{
						$user_data2 = mysqli_fetch_assoc($result2);
						//return $user_data;
						return $user_data2;
					}
				}

			}
			
			
		}
	}
	else if(isset($_SESSION['In_Id']))
	{

		$id = $_SESSION['In_Id'];
		$query = "select * from insurance where In_Id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			if($user_data)
			{
				$UID = $user_data['User_Id'];
				//read from database
				$query2 = "select * from user where U_ID = '$UID' limit 1";
				$result2 = mysqli_query($con, $query2);
				if($result2)
				{
					if($result2 && mysqli_num_rows($result2) > 0)
					{
						$user_data2 = mysqli_fetch_assoc($result2);
						//return $user_data;
						return $user_data2;
					}
				}

			}
			
			
		}
	}
}
?>

