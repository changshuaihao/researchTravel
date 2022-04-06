<template>
	<view>

		<view class="a">

			<view class="tab">
				<view class="tab-item" :class="tab==index?'active':''" @click="change(index)"
					v-for="(item,index) in order_data" :key="index">
					<!-- <image class="image" :src="item.url" @click="change(index)"></image> -->
					<view class="tab-view" @click="change(index)">{{item.title}}</view>
				</view>
			</view>
			<view class="content01">
				<view v-if="tab==0" v-for="(item,index) in huaxu" :key="index">
					<view class="cu-card case" :class="isCard?'no-card':''">
						<view class="cu-item shadow">
							<view class="image">
								<image src="/static/images/640.jpg" mode="widthFix"></image>
								<view class="cu-tag bg-blue">{{item.Sidelights_zui}}</view>
								<view class="cu-bar bg-shadeBottom"> <text class="text-cut">{{item.Sidelights_name}}</text></view>
							</view>
							<view class="cu-list menu-avatar">
								<view class="cu-item">
									<view class="cu-avatar round lg"
										style="background-image:url(/static/images/书01.jpg);"></view>
									<view class="content flex-sub">
										<view class="text-grey">{{item.Sidelights_author}}</view>
										<view class="text-gray text-sm flex justify-between">
											{{Sidelights_time}}
											<view class="text-gray text-sm">
												<text class="cuIcon-attentionfill margin-lr-xs"></text> 10
												<text class="cuIcon-appreciatefill margin-lr-xs"></text> 20
												<text class="cuIcon-messagefill margin-lr-xs"></text> 30
											</view>
										</view>
									</view>
								</view>
							</view>
						</view>
					</view>
				</view>
				<view v-if="tab==1" v-for="(item,index) in re" :key="index">
					<view class="cu-card case" :class="isCard?'no-card':''">
						<view class="cu-item shadow">
							<view class="image">
								<image src="/static/images/03.jpg" mode="widthFix"></image>
								<view class="cu-tag bg-blue">{{item.Sidelights_zui}}</view>
								<view class="cu-bar bg-shadeBottom"> <text class="text-cut">{{item.Sidelights_name}}</text></view>
							</view>
							<view class="cu-list menu-avatar">
								<view class="cu-item">
									<view class="cu-avatar round lg"
										style="background-image:url(/static/images/书02.jpg);"></view>
									<view class="content flex-sub">
										<view class="text-grey">{{item.Sidelights_author}}</view>
										<view class="text-gray text-sm flex justify-between">
											{{Sidelights_time}}
											<view class="text-gray text-sm">
												<text class="cuIcon-attentionfill margin-lr-xs"></text> 10
												<text class="cuIcon-appreciatefill margin-lr-xs"></text> 20
												<text class="cuIcon-messagefill margin-lr-xs"></text> 30
											</view>
										</view>
									</view>
								</view>
							</view>
						</view>
					</view>
				</view>
			</view>
		</view>
	</view>
</template>
<script>
	export default {
		data() {
			return {
				tab: 0,
				order_data: [{
						title: '最新花絮',

					},
					{
						title: '热门花絮'
					}
				],
				huaxu:[],
				re:[]
			}
		},
		props: ['title'],
		methods: {
			change(index) {
				console.log(index),
					this.tab = index
			}
		},
		onLoad() {
			uni.request({
				url:"http://127.0.0.1:3000/users/sidelights",
				success:(res) =>{
					this.huaxu=res.data
					console.log(this.huaxu)
				}
			})
			uni.request({
				url:"http://127.0.0.1:3000/users/sidelights02",
				success:(res) =>{
					this.re=res.data
					console.log(this.re)
				}
			})
			
		}

	}
</script>
<style>
	page {
		display: flex;
		flex-direction: column;
		height: 100%;
		/* background-color: #f4f4f4; */
	}

	.a {
		border-radius: 30rpx 30rpx 0 0;
		background-color: #F4F4F4;
		margin-top: 20rpx;
	}

	.tab {
		display: flex;
		margin-top: 20rpx;

	}

	.tab-item {
		flex: 1;
		font-size: 10pt;
		text-align: center;
		line-height: 72rpx;
		margin: 10rpx;
	}

	.content01 {
		flex: 1;
	}

	.tab-item.active {
		color: #000;
		background-color: #f4f4f4;
		border-bottom: 2rpx solid #FFCE35;
		color: #FFCE35;
	}
</style>
